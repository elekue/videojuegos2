<?php

namespace App\Http\Controllers;

use App\Models\Participacion;
use Illuminate\Http\Request;

class ParticipacionController extends Controller
{
    // Mostrar todas las participaciones
    public function index()
    {
        $participaciones = Participacion::all();
        return view('participaciones.index', compact('participaciones'));
    }

    // Mostrar el formulario para crear una nueva participación
    public function create()
    {
        return view('participaciones.create');
    }

    // Guardar la nueva participación en la base de datos
    public function store(Request $request)
    {
        // Aquí validamos y guardamos
        $validated = $request->validate([
            'campeonato_id' => 'required|exists:campeonatos,id',
            'jugador_id' => 'required|exists:jugadores,id',
            'anio' => 'required|integer',
            'puesto' => 'required|integer',
            'premio' => 'nullable|numeric',
        ]);

        Participacion::create($validated);

        return redirect()->route('participaciones.index')->with('success', 'Participación creada correctamente.');
    }

    // Mostrar una participación específica
    public function show(Participacion $participacion)
    {
        return view('participaciones.show', compact('participacion'));
    }

    // Mostrar el formulario para editar una participación
    public function edit(Participacion $participacion)
    {
        return view('participaciones.edit', compact('participacion'));
    }

    // Actualizar la participación en la base de datos
    public function update(Request $request, Participacion $participacion)
    {
        $validated = $request->validate([
            'campeonato_id' => 'required|exists:campeonatos,id',
            'jugador_id' => 'required|exists:jugadores,id',
            'anio' => 'required|integer',
            'puesto' => 'required|integer',
            'premio' => 'nullable|numeric',
        ]);

        $participacion->update($validated);

        return redirect()->route('participaciones.index')->with('success', 'Participación actualizada correctamente.');
    }

    // Eliminar una participación
    public function destroy(Participacion $participacion)
    {
        $participacion->delete();
        return redirect()->route('participaciones.index')->with('success', 'Participación eliminada correctamente.');
    }
}
