<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;//por si genero datos de prueba
use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    use HasFactory;//por si genero datos de prueba

    protected $fillable = ['nick', 'nombre', 'correo', 'telefono', 'nacionalidad'];

    public function participaciones()
    {
        return $this->hasMany(Participacion::class);
    }
}
