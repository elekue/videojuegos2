<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;//por si genero datos de prueba
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Jugador extends Authenticatable
{
    use HasFactory;//por si genero datos de prueba
    use Notifiable;

    protected $table = 'jugadores';

    protected $fillable = ['nick', 'nombre', 'email', 'telefono', 'nacionalidad'];

    protected $hidden = [
        'password',
        'remember_token',
    ];
//necesitamos saber si es admin para que le demos mas acceso o menos y le mostremos mas botones o menos
 // asi luego podemos preguntar if (Auth::user()->esAdmin()) {
    // Mostrar opciones de administrador}
   public function isAdmin()
    {
    return $this->es_admin;
    }
    public function participaciones()
    {
        return $this->hasMany(Participacion::class);
    }
}


