<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JugadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run(): void
    {
        Jugador::create([
            'nick' => 'eli',
            'nombre' => 'Elisabet Lekue',
            'email' => 'elekue@fptxurdinaga.com',
            'password' => Hash::make('eli'), // Puedes cambiar la contraseña
            'telefono' => '123456',
            'nacionalidad' => 'España',
            'es_admin' => 1,
        ]);

        Jugador::create([
            'nick' => 'jose',
            'nombre' => 'Jose Insausti',
            'email' => 'jose@fptxurdinaga.com',
            'password' => Hash::make('123'),
            'telefono' => '234567',
            'nacionalidad' => 'China',
            'es_admin' => 0,
        ]);

        Jugador::create([
            'nick' => 'jone',
            'nombre' => 'Jone Fernández',
            'email' => 'jone@fptxurdinaga.com',
            'password' => Hash::make('123'),
            'telefono' => '345678',
            'nacionalidad' => 'Colombia',
            'es_admin' => 0,
        ]);

        Jugador::create([
            'nick' => 'aitziber',
            'nombre' => 'Aitziber López',
            'email' => 'aitziber@txurdinaga.com',
            'password' => Hash::make('123'),
            'telefono' => '456789',
            'nacionalidad' => 'Portugal',
            'es_admin' => 0,
        ]);
    }
}
