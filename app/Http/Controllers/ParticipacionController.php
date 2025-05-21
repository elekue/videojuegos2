<?php
namespace App\Http\Controllers;
use App\Models\Participacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // usuarios (jugador)

class ParticipacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Mostrar todas las participaciones
    public function index()
    {
        $participaciones = Participacion::all();
        return view('participaciones.index', compact('participaciones'));
    }

    // Mostrar el formulario para crear una nueva participación
    public function create()
    {
        $campeonatos = \App\Models\Campeonato::all();
        return view('participaciones.create', compact('campeonatos'));
    }

    // Guardar la nueva participación en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'campeonato_id' => 'required|exists:campeonatos,id',
        ]);

        $jugador = Auth::user(); // Jugador autenticado

        // Verifica si ya está inscrito
        $yaExiste = Participacion::where('jugador_id', $jugador->id)
            ->where('campeonato_id', $request->campeonato_id)
            ->exists();

        if ($yaExiste) {
            return back()->with('error', 'Ya estás inscrito en este campeonato.');
        }

        Participacion::create([
            'jugador_id' => $jugador->id,
            'campeonato_id' => $request->campeonato_id,
            'anio' => now()->year,
            'puesto' => 0,
            'premio' => null,
        ]);

        return redirect()->route('participaciones.index')->with('success', 'Te has inscrito correctamente.');
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
        /*$validated = $request->validate([
            'campeonato_id' => 'required|exists:campeonatos,id',
            'jugador_id' => 'required|exists:jugadores,id',
            'anio' => 'required|integer',
            'puesto' => 'required|integer',
            'premio' => 'nullable|numeric',
        ]);*/

        $data = $request->only(['campeonato_id', 'user_id']);

        if (auth()->user()->isAdmin()) {
            $data['puntos'] = $request->input('puntos');
            $data['premio'] = $request->input('premio');
        }
    
        $participacion->update($data);

        return redirect()->route('participaciones.index')->with('success', 'Participación actualizada correctamente.');
    }

    // Eliminar una participación
    public function destroy(Participacion $participacion)
    {
        $participacion->delete();
        return redirect()->route('participaciones.index')->with('success', 'Participación eliminada correctamente.');
    }
}