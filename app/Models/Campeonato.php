<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campeonato extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'localidad', 'fecha_inicio', 'fecha_fin', 'premio', 'tipo', 'normas',];
    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
    ];

    public function participaciones()
    {
        return $this->hasMany(Participacion::class);
    }
}