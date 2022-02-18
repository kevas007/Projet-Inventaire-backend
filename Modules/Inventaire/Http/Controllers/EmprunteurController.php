<?php

namespace Modules\Inventaire\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\Inventaire\Entities\Emprunteur;

class EmprunteurController extends Controller
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
        return view('inventaire::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'nom'=>['required','min:1','string'],
            'prenom'=>['required','min:1','string'],
            'formation'=>['required','min:1','string'],
            'adresse'=>['required','min:1','string'],
            'cart_id'=>['required','image'],
            'date_naissance'=>['required','date','before:today'],
        ]);

        $emprunteur = new Emprunteur();
        $emprunteur->nom = $request->nom;
        $emprunteur->prenom = $request->prenom;
        $emprunteur->formation = $request->formation;
        $emprunteur->adresse = $request->adresse;
        $emprunteur->date_naissance = $request->date_naissance;

        $filename = Storage::disk('public')->put('/carte_identite',$request->cart_id);
        $emprunteur->cart_id = $filename;

        $emprunteur->save();

        return redirect();
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
}
