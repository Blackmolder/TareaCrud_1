<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiciosTipoController;



Route::get('/', function () {
    return view('auth.login');
});

/*Route::get('/servicios_tipos', function () {
    return view('servicios_tipos.index');
});

Route::get('/servicios_tipos/create',[ServiciosTipoController::class,'create']);*/

Route::resource('servicios_tipos', ServiciosTipoController::class)->middleware('auth');
//Auth::routes(['register'=>false,'reset'=>false]);

Auth::routes();

Route::get('/home', [ServiciosTipoController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'],function() {

    Route::get('/', [ServiciosTipoController::class, 'index'])->name('home');

});

