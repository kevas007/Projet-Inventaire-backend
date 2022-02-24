<?php

namespace Modules\Inventaire\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Inventaire\Entities\Contrat;
use Modules\Inventaire\Entities\Info;
use Modules\Inventaire\Entities\Materiel;

class RestitutionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $materiels = Materiel::where('statut_id', 1)->get();
        return view('inventaire::partials.restitution.index', compact('materiels'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'degats'=>['required']
        ]);
        $materiel = Materiel::find($id);
        $contrat = Contrat::where('materiel_id', $id)->where('statut_contrat_id', 2)->first();
        $infoPc = Info::where('materiel_id', $id)->first();
        $materiel->statut_id = 2;
        $materiel->save();
        $infoPc->degats = $request->degats;
        $infoPc->save();
        $contrat->statut_contrat_id = 3;
        $contrat->save();
        return redirect('/inventaire/materiels');
    }
}
