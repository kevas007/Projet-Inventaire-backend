<?php

namespace Modules\Inventaire\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Inventaire\Entities\Materiel;

class MaterielController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('inventaire::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('inventaire::materiels.create');
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
            'token' => 'required|min:1',
            'utility_id' => 'required|min:1',
            'statut_id' => 'required|min:1',
            'type_id' => 'required|min:1',
            'place_id' => 'required|min:1',
            'duree' => 'required|date',
        ]);

        $materiel = new Materiel();
        $materiel->nom = $request->nom;
        $materiel->numero_serie = $request->numero_serie;
        $materiel->token = $request->token;
        $materiel->utility_id = $request->utility_id;
        $materiel->statut_id = $request->statut_id;
        $materiel->type_id = $request->type_id;
        $materiel->place_id = $request->place_id;
        $materiel->duree = $request->duree;
        $materiel->save();

        return redirect()->back()->with(['msg' => "Materiel enregisté avec succès"]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('inventaire::show');
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
        //
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
    public function validate()
    {
        return view('inventaire::codeQr');
    }
    
}
