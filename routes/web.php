<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampeonatoController;
use App\Http\Controllers\ParticipacionController;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\AuthSimpleController;//para autenticar

//autenticacion
Route::get('/login', [AuthSimpleController::class, 'showForm'])->name('login');
Route::post('/login', [AuthSimpleController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthSimpleController::class, 'logout'])->name('logout');

Route::resource('campeonatos', CampeonatoController::class);//la autenticacion mediante atributos en CampeonatoController

Route::resource('jugadores', JugadorController::class);
   // ->only(['index', 'show']);
   
//Route::resource('participaciones', ParticipacionController::class);
    //->only(['index', 'show']);

    Route::resource('participaciones', ParticipacionController::class)->parameters([
        'participaciones' => 'participacion'
    ]);

Route::get('/', function () {
    return view('welcome');
});

