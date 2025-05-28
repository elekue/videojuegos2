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
        //$participaciones = Participacion::all();
        
        $participaciones = Participacion::with('campeonato', 'jugador')
    ->orderBy('campeonato_id')
    ->orderBy('puesto')
    ->get();

        return view('participaciones.index', compact('participaciones'));
    }

   
    // Mostrar una participación específica
    //public function show(Participacion $participacion)
   // {
    
   // }


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
                
            ]);
    
        return redirect()->route('participaciones.index')->with('success', 'Participación actualizada correctamente.');
    }
         
       
        // Modificar puesto y premio

        public function edit(Participacion $participacion)
        {
            // Si quieres, chequear que sea admin aquí
            $participacion->load('campeonato');
            return view('participaciones.edit', compact('participacion'));
        }

        public function store(Request $request)
        {
            // Validar si el usuario ya está apuntado (opcional)
            $user = auth()->user(); //está configurad en config / auth.php
            $campeonatoId = $request->input('campeonato_id');
        
            // Evitar duplicados (opcional pero recomendable)
            $existe = Participacion::where('jugador_id', $user->id)
                ->where('campeonato_id', $campeonatoId)
                ->exists();
        
            if ($existe) {
                return redirect()->back()->with('error', 'Ya estás apuntado a este campeonato.');
            }
        
            // Guardar la participación
            Participacion::create([
                'jugador_id' => $user->id,
                'campeonato_id' => $campeonatoId,
            ]);
        
            return redirect()->back()->with('success', 'Te has apuntado al campeonato.');
        }


    // Eliminar una participación
    //public function destroy(Participacion $participacion)
   // {
     //   $participacion->delete();
       // return redirect()->route('participaciones.index')->with('success', 'Participación eliminada correctamente.');
   // }
}