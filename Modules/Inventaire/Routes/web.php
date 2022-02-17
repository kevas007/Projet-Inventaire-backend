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

Route::prefix('inventaire')->group(function() {
    Route::get('/', 'InventaireController@index');
    Route::get('/dashboard',function(){
        return view('inventaire::partials.materiel.materiel');
    })->middleware('auth');
    Route::get('/generate-qrcode', [MaterielController::class, 'validate']);
    Route::get('/materiel', [MaterielController::class, 'index'])->middleware('auth');
    Route::get('/materiel/{id}', [MaterielController::class, 'show'])->middleware('auth');
});


require __DIR__.'/auth.php';
