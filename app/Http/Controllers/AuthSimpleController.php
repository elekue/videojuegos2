<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jugador;
use Illuminate\Support\Facades\Auth;

class AuthSimpleController extends Controller
{
    // Mostrar formulario para identificarse (login simple)
    public function showForm()
    {
        return view('auth.identificar');
    }

    // Procesar login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:jugadores,email',
        ]);

        // Buscar jugador por email
        $jugador = Jugador::where('email', $request->email)->first();

        if ($jugador) {
            Auth::login($jugador);

        return redirect()->route('campeonatos.index')->with('success', 'Has iniciado sesión correctamente');
    }
    return back()->withErrors(['email' => 'Email no encontrado']);
}

    // Cerrar sesión
    public function logout()
    {
        Auth::logout();
        return redirect()->route('campeonatos.index')->with('success', 'Has cerrado sesión');
    }
}
