<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampeonatoController;
use App\Http\Controllers\ParticipacionController;
use App\Http\Controllers\JugadorController;

Route::resource('campeonatos', CampeonatoController::class)
    ->only(['index', 'show']);

Route::resource('participaciones', ParticipacionController::class)
    ->only(['index', 'show']);

Route::resource('jugadores', JugadorController::class)
    ->only(['index', 'show']);

Route::get('/', function () {
    return view('welcome');
});