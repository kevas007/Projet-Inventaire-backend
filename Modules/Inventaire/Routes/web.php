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

use Modules\Inventaire\Http\Controllers\MaterielController;
use Modules\Inventaire\Http\Controllers\ReservationController;

Route::prefix('inventaire')->middleware('auth')->group(function () {
    Route::get('/', 'InventaireController@index');
    Route::get('/dashboard', function () {
        return view('inventaire::dashboard');
    })->middleware('auth');
    Route::get('/generate-qrcode', [MaterielController::class, 'validate'])->middleware('auth');
    Route::get('/materiel', [MaterielController::class, 'index'])->middleware('auth');
    Route::get('/materiel/{id}', [MaterielController::class, 'show'])->middleware('auth');

    // Reservation de matériel 
    Route::get('/reserver/{id}', [ReservationController::class, 'show']);
    Route::post('/reserver/{id}', [ReservationController::class, 'store']);
});


require __DIR__ . '/auth.php';
