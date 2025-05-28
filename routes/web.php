<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampeonatoController;
use App\Http\Controllers\ParticipacionController;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\AuthSimpleController;//para autenticar

//autenticacion basica //Mostrar formulario de login
Route::get('/login', [AuthSimpleController::class, 'showForm'])->name('login');
// Procesar datos del login
Route::post('/login', [AuthSimpleController::class, 'login'])->name('login.post');
// Cerrar sesión
Route::post('/logout', [AuthSimpleController::class, 'logout'])->name('logout');
// CRUD completo para campeonatos (index, create, store, show, edit, update, destroy)
Route::resource('campeonatos', CampeonatoController::class);//la autenticacion mediante atributos en CampeonatoController
// CRUD completo para jugadores
Route::resource('jugadores', JugadorController::class);
// Rutas para participaciones (Utilizamos parametros porque el modelo se llama Participacion y no Participacione 'participacion')
Route::resource('participaciones', ParticipacionController::class)
    ->parameters(['participaciones' => 'participacion'])
    ->except(['show']);

//ruta para la página principal    
Route::get('/', function () {
    return view('welcome');
});

