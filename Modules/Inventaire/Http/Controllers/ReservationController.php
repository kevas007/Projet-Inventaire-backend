<?php

namespace Modules\Inventaire\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Inventaire\Entities\Materiel;
use Modules\Inventaire\Entities\Reservation;
use Modules\Inventaire\Entities\Utility;

class ReservationController extends Controller
{
    public function create($id)
    {
        $materiel = Materiel::find($id);
        $utilities = Utility::all();
        return view('inventaire::reservation.create', compact('utilities', 'materiel'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'utility_id' => ['required', 'exists:utilities,id'],
            'start_date' => ['required', 'date', 'after:today', 'before:end_date'],
            'end_date' => ['required', 'date', 'after:start_date'],
        ]);
        $reservationsExists = Reservation::where('materiel_id', $id)->whereDate('debut', '>=', $request->start_date)->whereDate('fin', '<=', $request->end_date)->exists();
        if (!$reservationsExists) {

            $materiel = Materiel::find($id);
            $materiel->utility_id = $request->utility_id;
            $materiel->statut_id = 3;
            $materiel->save();

            $reservation = new Reservation();
            $reservation->debut = $request->start_date;
            $reservation->fin = $request->end_date;
            $reservation->materiel_id = $id;
            $reservation->save();
            return redirect('/inventaire/materiel');
        } else {
            return redirect()->back()->with(['msg' => 'This date is already reserved']);
        }
    }
}
