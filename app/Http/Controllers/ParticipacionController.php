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
   /* public function create()
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

        // ****************Verificar si ya está inscrito**********************

        $campeonatoId = $request->campeonato_id;

        $yaInscrito = Participacion::where('campeonato_id', $campeonatoId)
            ->where('jugador_id', $jugador->id)
            ->exists();

        if ($yaInscrito) {
        return redirect()->back()->with('error', 'Ya estás inscrito en este campeonato.');
        }   
        //**************************************************************************** */

       /* Participacion::create([
            'jugador_id' => $jugador->id,
            'campeonato_id' => $request->campeonato_id,
            'anio' => now()->year,
            'puesto' => 90,
            'premio' => 33,
        ]);

        return redirect()->route('participaciones.index')->with('success', 'Te has inscrito correctamente.');
    }*/

    // Mostrar una participación específica
    public function show(Participacion $participacion)
    {
        return view('participaciones.show', compact('participacion'));
    }

    // Mostrar el formulario para editar una participación
    /*public function edit(Participacion $participacion)
    {
        return view('participaciones.edit', compact('participacion'));
    }*/

    // Actualizar la participación en la base de datos
    /*public function update(Request $request, Participacion $participacion)
    {
        

        if (auth()->user()->isAdmin()) {
            $request->validate([
                'puesto' => 'required|integer|min:1',
            ]);
            $participacion->update([
                'puesto' => $request->puesto,
            ]);
        
        }*/
        public function update(Request $request, Participacion $participacion)
        {
            if (!auth()->user()->isAdmin()) {
                abort(403, 'No autorizado');
            }
        
            $request->validate([
                'puesto' => 'required|integer|min:1',
                'premio' => 'nullable|numeric|min:0',
            ]);
        
            $participacion->update([
                'puesto' => $request->puesto,
                'premio' => $request->premio,
            ]);
    
        return redirect()->route('participaciones.index')->with('success', 'Participación actualizada correctamente.');
    }
         
        

        


        // Modificar puesto y premio

        public function edit(Participacion $participacion)
        {
            // Si quieres, chequear que sea admin aquí
        
            return view('participaciones.edit', compact('participacion'));
        }

    // Eliminar una participación
    public function destroy(Participacion $participacion)
    {
        $participacion->delete();
        return redirect()->route('participaciones.index')->with('success', 'Participación eliminada correctamente.');
    }
}