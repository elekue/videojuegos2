<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jugador;
class JugadorController extends Controller
{
    public function index()
    {
        // Aquí mostrarás la lista de jugadores
        $jugadores = Jugador::orderBy('nick')->get();
         //jugadores con sus participaciones y campeonatos,
         $jugadores = Jugador::with('participaciones.campeonato')->get();
        return view('jugadores.index', compact('jugadores'));
       
    
    }
//mostrar campeonatos de jugador
    public function show($id)
{
    $jugador = Jugador::with('participaciones.campeonato')->findOrFail($id);
    return view('jugadores.show', compact('jugador'));
}


    // Agregar luego otros métodos  (create, store, edit, update, destroy)
}
