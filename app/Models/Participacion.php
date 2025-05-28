<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participacion extends Model
{
    protected $table = 'participaciones'; // <- ahora coincide con la tabla real 
    protected $fillable = [
        'campeonato_id',
        'jugador_id',
        'anio',
        'puesto',
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
