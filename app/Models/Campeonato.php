<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campeonato extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'localidad', 'tipo', 'normas'];

    public function participaciones()
    {
        return $this->hasMany(Participacion::class);
    }
}