<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Campeonato;
use Illuminate\Http\Request;
use App\Http\Middleware\CheckAdmin;
//Laravel 11 permite aplicar middleware en el controlador usando esos atributos PHP 8:
//El atributo auth queda para TODO el controlador, para que todas las acciones requieran usuario autenticado.
#[\Illuminate\Routing\Middleware('auth')]

class CampeonatoController extends Controller
{
    public function __construct()
    {
        // Añadimos este constructor para usar middleware solo en ciertos métodos
        $this->middleware(CheckAdmin::class)->only(['create', 'store', 'edit', 'update', 'destroy']);
    }
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
        if (!auth()->user()->isAdmin()) {
            abort(403, 'No autorizado');
        }
        else return view('campeonatos.edit', compact('campeonato'));
    }

    // Actualizar campeonato
    public function update(Request $request, Campeonato $campeonato)
    {
       /* $request->validate([
            'nombre' => 'required|string|max:255',
            'localidad' => 'required|string|max:255',
            'tipo' => 'required|in:individual,equipo,mixto',
            'normas' => 'nullable|string',
        ]);*/
        if (!auth()->user()->isAdmin()) {
            abort(403, 'No autorizado');}
        else
        $campeonato->update($request->all());

        return redirect()->route('campeonatos.index')->with('success', 'Campeonato actualizado correctamente.');
    }

    // Eliminar campeonato
    public function destroy(Campeonato $campeonato)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'No autorizado');}
        else
        $campeonato->delete();

        return redirect()->route('campeonatos.index')->with('success', 'Campeonato eliminado correctamente.');
    }
}
