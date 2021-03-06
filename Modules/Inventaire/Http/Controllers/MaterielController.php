<?php

namespace Modules\Inventaire\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Modules\Inventaire\Entities\Info;
use Modules\Inventaire\Entities\Materiel;
use Modules\Inventaire\Entities\Place;
use Modules\Inventaire\Entities\Statut;
use Modules\Inventaire\Entities\Stockage;
use Modules\Inventaire\Entities\Type;
use Modules\Inventaire\Entities\Utility;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class MaterielController extends Controller
{
    public function __construct()
    {
        $this->middleware('Lead')
            ->except('index', 'show', 'pdf', 'qrcode', 'destroy', 'delete', 'restore', 'search');
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $materiels = Materiel::with("statut")->withTrashed()->get();


        return view('inventaire::partials.materiel.index', compact('materiels'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $utility = Utility::all();
        $statut = Statut::all();
        $type = Type::all();
        $info = Info::all();
        $place = Place::all();
        $stockage = Stockage::all();
        return view('inventaire::partials.materiel.create', compact('utility', 'statut', 'type', 'info', 'place', 'stockage'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|min:1',
            'numero_serie' => 'required|min:1',
            'utility_id' => 'required|min:1',
            'statut_id' => 'required|min:1',
            'type_id' => 'required|min:1',
            'place_id' => 'required|min:1',
        ]);
        $materiel = new Materiel();
        $materiel->nom = $request->nom;
        $materiel->numero_serie = $request->numero_serie;
        $token = false;
        do {
            $token = random_int(100000, 999999);
        } while (Materiel::where("token", "=", $token)->first());
        $materiel->token = $token;
        $materiel->utility_id = $request->utility_id;
        $materiel->statut_id = $request->statut_id;
        $materiel->type_id = $request->type_id;
        $materiel->place_id = $request->place_id;
        $materiel->save();
        $info = new Info();
        $info->processeur = $request->processeur;
        $info->ram = $request->ram;
        $info->taille_stockage = $request->taille_stockage;
        $info->marque = $request->marque;
        $info->description = $request->description;
        $info->degats = $request->degats;
        $info->stockage_id = $request->stockage_id;
        $info->materiel_id = $materiel->id;
        $info->save();

        return redirect('/inventaire/materiel')->with(['msg' => "Materiel enregist?? avec succ??s"]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $materiel = Materiel::withTrashed()->with("statut", "utility", "type", "place")->where("id", $id)->first();
        $info = Info::with("stockage")->where("materiel_id", $id)->first();
        $statut = Statut::all();
        return view('inventaire::partials.materiel.show', compact('materiel', 'info', 'statut'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('inventaire::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'statut_id' => ['required', 'exists:statuts,id'],
        ]);
        $update = Materiel::find($id);
        $update->statut_id = $request->statut_id;
        $update->save();
        return redirect('/inventaire/materiel')->with(['msg' => "Materiel mis ?? jour avec succ??s"]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $destroy = Materiel::find($id);
        $destroy->delete();
        return redirect('/inventaire/materiel')->with(['msg' => "Materiel supprim?? avec succ??s"]);
    }

    //supprim?? de fa??on definitive
    public function delete($id)
    {
        $destroy = Materiel::withTrashed()->find($id);
        $destroy->forceDelete();
        return redirect('/inventaire/materiel')->with(['msg' => "Materiel supprim?? avec succ??s"]);
    }

    public function validate()
    {
        return view('inventaire::codeQr');
    }
    //creation du pdf
    public function createPDF($id)
    {
        // retreive all records from db
        $data = Materiel::find($id);
        // share data to view
        view()->share('inventaire::partials.materiel.codeQr', compact('data'));
        return   $pdf = FacadePdf::loadView('inventaire::partials.materiel.codeQr', compact('data'))
            ->setPaper('a4', 'landscape')
            ->setWarnings(false)
            ->stream();
    }

//fonction pour retourner le code qr
    public function search(Request $request)
    {
        $materiels = Materiel::with("statut")->get();
        return view('inventaire::partials.materiel.search', compact('materiels'));
    }
//fonction pour recuperer et afficher le code qr
    public function searchResult($token)
    {
        $materiels = Materiel::where('token', $token)->first();
        return redirect('/inventaire/materiel/' . $materiels->id);
    }

    //fonction pour restaurer un materiel
    public function restore($id){
        $materiels = Materiel::withTrashed()->find($id)->restore();
        return redirect()->back();
    }
}
