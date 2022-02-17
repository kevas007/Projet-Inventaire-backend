<?php

namespace Modules\Inventaire\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Inventaire\Entities\Materiel;
use Modules\Inventaire\Entities\Utility;

class ReservationController extends Controller
{
    public function show($id){
        $materiel = Materiel::find($id);
        $utilities = Utility::all();
        return view('inventaire::reservation.show', compact('utilities', 'materiel'));
    }

    public function store(Request $request, $id){

        $request->validate([
            'utility_id'=>['required', 'exists:utilities,id'],
            'date'=>['required'],
        ]);

        $materiel = Materiel::find($id);
        $materiel->utility_id = $request->utility_id;
        $materiel->duree = $request->date;
        $materiel->statut_id = 3;
        $materiel->save();
        
        return redirect()->back();
    }
}
