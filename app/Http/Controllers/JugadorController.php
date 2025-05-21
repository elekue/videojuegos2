<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jugador;
class JugadorController extends Controller
{
    public function index()
    {
        // Aquí mostrarás la lista de jugadores
        $jugadores = Jugador::all();
        return view('jugadores.index', compact('jugadores'));
    }

    public function show($id)
    {
        // Aquí mostrarás un jugador concreto
    }

    // Agregar luego otros métodos  (create, store, edit, update, destroy)
}
