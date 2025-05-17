<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('participaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campeonato_id')->constrained('campeonatos')->onDelete('cascade');
            $table->foreignId('jugador_id')->constrained('jugadores')->onDelete('cascade');
            $table->year('anio');
            $table->integer('puesto');
            $table->decimal('premio', 8, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('participaciones');
    }
};
