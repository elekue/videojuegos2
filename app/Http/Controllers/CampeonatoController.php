<?php

namespace App\Http\Controllers;

use App\Models\Campeonato;
use Illuminate\Http\Request;

class CampeonatoController extends Controller
{
    // Mostrar lista de campeonatos
    public function index()
    {
        $campeonatos = Campeonato::all();
        return view('campeonatos.index', compact('campeonatos'));
    }

    // Mostrar formulario para crear un nuevo campeonato
    public function create()
    {
        return view('campeonatos.create');
    }

    // Guardar un campeonato nuevo
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'localidad' => 'required|string|max:255',
            'tipo' => 'required|in:individual,equipo,mixto',
            'normas' => 'nullable|string',
        ]);

        Campeonato::create($request->all());

        return redirect()->route('campeonatos.index')->with('success', 'Campeonato creado correctamente.');
    }

    // Mostrar un campeonato en detalle
    public function show(Campeonato $campeonato)
    {
        return view('campeonatos.show', compact('campeonato'));
    }

    // Mostrar formulario para editar campeonato
    public function edit(Campeonato $campeonato)
    {
        return view('campeonatos.edit', compact('campeonato'));
    }

    // Actualizar campeonato
    public function update(Request $request, Campeonato $campeonato)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'localidad' => 'required|string|max:255',
            'tipo' => 'required|in:individual,equipo,mixto',
            'normas' => 'nullable|string',
        ]);

        $campeonato->update($request->all());

        return redirect()->route('campeonatos.index')->with('success', 'Campeonato actualizado correctamente.');
    }

    // Eliminar campeonato
    public function destroy(Campeonato $campeonato)
    {
        $campeonato->delete();

        return redirect()->route('campeonatos.index')->with('success', 'Campeonato eliminado correctamente.');
    }
}
