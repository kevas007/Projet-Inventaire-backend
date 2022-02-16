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
        return view('inventaire::layouts.main');
    })->middleware('auth');
    Route::get('/generate-qrcode', [MaterielController::class, 'validate']);
});


require __DIR__.'/auth.php';
