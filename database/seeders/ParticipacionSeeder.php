<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParticipacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    /*    // Obtener jugadores no-admin
        $jose = Jugador::where('nick', 'jose')->first();
        $jone = Jugador::where('nick', 'jone')->first();
        $aitziber = Jugador::where('nick', 'aitziber')->first();

        // Obtener campeonatos
        $lol = Campeonato::where('nombre', 'League of Legends Championship')->first();
        $fifa = Campeonato::where('nombre', 'FIFA Challenge Cup')->first();
        $smash = Campeonato::where('nombre', 'Super Smash Battle')->first();

        // Participaciones con año y puesto
        Participacion::create([
            'jugador_id' => $jose->id,
            'campeonato_id' => $lol->id,
            'anio' => 2025,
            'puesto' => 1,
        ]);

        Participacion::create([
            'jugador_id' => $jone->id,
            'campeonato_id' => $fifa->id,
            'anio' => 2025,
            'puesto' => 2,
        ]);

        Participacion::create([
            'jugador_id' => $aitziber->id,
            'campeonato_id' => $smash->id,
            'anio' => 2025,
            'puesto' => 3,
        ]);

        Participacion::create([
            'jugador_id' => $jose->id,
            'campeonato_id' => $smash->id,
            'anio' => 2025,
            'puesto' => 4,
        ]);
    */
    }
}
