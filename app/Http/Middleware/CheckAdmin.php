<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
       /* if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }*/
        if (!$user || !$user->isAdmin()) { // definido isAdmin() en tu modelo
            return redirect('/')->with('error', 'No tienes permisos para acceder.');
        }
        return $next($request);
    }
}