<?php

namespace Modules\Inventaire\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Inventaire\Entities\Contrat;
use Modules\Inventaire\Entities\Materiel;
use Modules\Inventaire\Entities\StatutContrat;

class ContratController extends Controller
{
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

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request, $token)
    {
        $materiel = Materiel::where('token', $token)->first();
        $contrat = new Contrat();
        $contrat->materiel_id=$materiel->id;
        $contrat->statut_id = 1;
        $contrat->save();
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
