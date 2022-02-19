<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Models\User;
use Modules\Inventaire\Entities\Emprunteur;
use Modules\Inventaire\Entities\Materiel;
use Modules\Inventaire\Entities\Role;

// use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Modules\Inventaire\Http\Controllers\EmprunteurController;
use Modules\Inventaire\Http\Controllers\MaterielController;
use Modules\Inventaire\Http\Controllers\ReservationController;

Route::prefix('inventaire')->middleware('auth')->group(function () {
    // Route::get('/', 'InventaireController@index');

    //dashboard
    Route::get('/dashboard', function () {
        return view('inventaire::dashboard');
    })->middleware('auth');
    //code Qr
    Route::get('/generate-qrcode', [MaterielController::class, 'validate'])->middleware('auth');

    //materiel
    Route::get('/materiel', [MaterielController::class, 'index'])->middleware('auth');
    Route::get('/materiel/create', [MaterielController::class, 'create'])->middleware('auth');
    Route::post('/materiel/create', [MaterielController::class, 'store'])->middleware('auth');
    Route::get('/materiel/codeQr', [MaterielController::class, 'search'])->middleware('auth');
    Route::get('/materiel/{token}/search', [MaterielController::class, 'searchResult'])->middleware('auth');
    Route::get('/materiel/{id}/restaurer', [MaterielController::class, 'restore'])->middleware('auth');
    Route::get('/materiel/{id}', [MaterielController::class, 'show'])->middleware('auth');
    Route::get('/materiel/{id}/edit', [MaterielController::class, 'edit'])->middleware('auth');
    Route::put('/materiel/{id}/edit', [MaterielController::class, 'update'])->middleware('auth');
    Route::delete('/materiel/{id}/delete', [MaterielController::class, 'destroy'])->middleware('auth');
    Route::delete('/materiel/{id}/forceDelete', [MaterielController::class, 'delete'])->middleware('auth');
    Route::get('/materiel/{id}/pdf', [MaterielController::class, 'createPDF'])->middleware('auth');

    // Reservation de matériel
    Route::get('/reserver/{id}', [ReservationController::class, 'create']);
    Route::post('/reserver/{id}', [ReservationController::class, 'store']);

    // Emprunt Materiel
    Route::get('/emprunt/{id}/', [EmprunteurController::class,'create']);
    Route::get('testContrat', function(){
        $preteur = User::first();
        $materiel = Materiel::first();
        $emprunteur = Emprunteur::first();
        $duree= 'lol';
        // view()->share('inventaire::contrats.pdf', compact('preteur','materiel', 'emprunteur', 'duree'));
        return view('inventaire::contrats.pdf', compact('preteur','materiel', 'emprunteur', 'duree'));
    });

    Route::get('/contrat/{token}/', [ContratController::class,'store']);
});


require __DIR__ . '/auth.php';
