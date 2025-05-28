<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Campeonato;
use Illuminate\Support\Str;

class CampeonatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Generar campeonatos
       Campeonato::create([
        'nombre' => 'League of Legends Championship',
        'localidad' => 'Bilbao',
        'tipo' => 'equipo',
        'fecha_inicio' => '2025-07-01',
        'fecha_fin' => '2025-07-10',
        'premio' => 200,
        
    ]);

    Campeonato::create([
        'nombre' => 'FIFA Challenge Cup',
        'localidad' => 'Madrid',
        'tipo' => 'equipo',
        'fecha_inicio' => '2025-08-15',
        'fecha_fin' => '2025-08-20',
        'premio' => 200,
    ]);

    Campeonato::create([
        'nombre' => 'Super Smash Battle',
        'localidad' => 'Barcelona',
        'tipo' => 'mixto',
        'fecha_inicio' => '2025-09-05',
        'fecha_fin' => '2025-09-10',
        'premio' => 100,
    ]);
    }
}
