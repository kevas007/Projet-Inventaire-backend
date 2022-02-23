<?php

namespace Modules\Inventaire\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Modules\Inventaire\Entities\Contrat;
use Modules\Inventaire\Entities\Emprunteur;
use Modules\Inventaire\Entities\Materiel;
use Modules\Inventaire\Entities\StatutContrat;

class ContratController extends Controller
{

    public function __construct(){
        $this->middleware('Lead');
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {

        $contrats = Contrat::with('materiel.place','materiel', 'preteur', 'emprunteur','team', 'statut')->get();
        return view('inventaire::partials.contrats.index', compact('contrats'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {

        return view('inventaire::create');
    }

    public function storeSelf(Request $request)
    {

        $materiel = Materiel::find($request->materiel_id);
        if($materiel->statut_id == 2){

            $contrat = new Contrat();
            $contrat->materiel_id = $request->materiel_id;
            $contrat->statut_contrat_id = 2;
            $contrat->preteur_id = Auth::id();
            $contrat->save();

            $materiel->statut_id = 1;
            $materiel->save();

            return redirect('/inventaire/materiel');
        }
        return back();
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function storeEmprunteur(Request $request, $id)
    {
        $request->validate([
            'nom' => ['required', 'min:1', 'string'],
            'prenom' => ['required', 'min:1', 'string'],
            'formation' => ['required', 'min:1', 'string'],
            'adresse' => ['required', 'min:1', 'string'],
            'cart_id' => ['required', 'image'],
            'date_naissance' => ['required', 'date', 'before:today'],
        ]);
        $emprunteur = new Emprunteur();
        $emprunteur->nom = $request->nom;
        $emprunteur->prenom = $request->prenom;
        $emprunteur->adresse = $request->adresse;
        $emprunteur->formation = $request->formation;
        $emprunteur->date_naissance = $request->date_naissance;
        $filename = Storage::disk('public')->put('/carte_identite', $request->cart_id);
        $emprunteur->carte_id = $filename;
        $emprunteur->save();

        $materiel = Materiel::find($id);
        $contrat = new Contrat();
        $contrat->materiel_id = $materiel->id;
        $contrat->statut_contrat_id = 2;
        $contrat->emprunteur_id = $request->emprunteur_id;
        $contrat->preteur_id = Auth::id();
        $contrat->save();

        $materiel->statut_id = 1;
        $materiel->save();

        return redirect('/inventaire/materiel');
    }
    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function storeTeam(Request $request, $id)
    {



        $materiel = Materiel::find($id);
        $contrat = new Contrat();
        $contrat->materiel_id = $materiel->id;
        $contrat->statut_contrat_id = 2;
        $contrat->team_id = $request->team_id;
        $contrat->preteur_id = Auth::id();
        $contrat->save();
        $materiel->statut_id = 1;
        $materiel->save();
        return redirect('/inventaire/materiel');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {

        return view('inventaire::partials.contrats.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $edit= Contrat::with('materiel.place','materiel', 'preteur', 'emprunteur','team', 'statut')->find($id);
        $statut= StatutContrat::all();
        return view('inventaire::partials.contrats.edit', compact('edit', 'statut'));
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
            'statut_contrat_id' => ['required', 'exists:statut_contrats,id'],
        ]);
        $update=  Contrat::find($id);
        $update->statut_contrat_id = $request->statut_contrat_id;
        $update->save();
        return redirect('/inventaire/contrat')->with(['msg' => "Contrat mis à jour avec succès"]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
