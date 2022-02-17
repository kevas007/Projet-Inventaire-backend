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
        $utitlies = Utility::all();
        return view('inventaire::reservation.show', compact('utitlies', 'materiel'));
    }

    public function store(Request $request, $id){
        $request->validate([
            'utility_id'=>['required', 'exists:utilities,id'],
            'date'=>['required', 'date'],
        ]);
    }
}
