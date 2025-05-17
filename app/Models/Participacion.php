<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participacion extends Model
{
    protected $fillable = [
        'campeonato_id',
        'jugador_id',
        'anio',
        'puesto',
        'premio',
    ];

    public function campeonato()
    {
        return $this->belongsTo(Campeonato::class);
    }

    public function jugador()
    {
        return $this->belongsTo(Jugador::class);
    }
}
