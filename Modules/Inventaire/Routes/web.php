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

Route::prefix('inventaire')->middleware('auth')->group(function() {
    Route::get('/', 'InventaireController@index');
    Route::get('/dashboard',function(){
        return view('inventaire::partials.materiel.materiel');
    });
    Route::get('/generate-qrcode', [MaterielController::class, 'validate']);
    Route::get('/reserver/{id}',[ReservationController::class,'show']);
});


require __DIR__.'/auth.php';
