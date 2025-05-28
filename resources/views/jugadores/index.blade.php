@extends('layouts.app')

@section('content')
    <h1>Listado de Jugadores</h1>
    <div class="jugadores-grid">
    
        @foreach($jugadores as $jugador)
        <div class="jugador-card"> {{-- <-- cada tarjeta --}}
            <h3><a href="{{ route('jugadores.show', $jugador->id) }}" class="jugador-nick" style="color: #70b7ff;">
                {{ $jugador->nick }}
            </a> </h3>
            <h4>{{ $jugador->email }}</h4>
        </div>
        @endforeach
    </div>
    <div id="campeonatos-detalle" style="margin-top: 2rem; background: #2c2c3c; padding: 1rem; border-radius: 8px; display: none;">
        <h3>Campeonatos de <span id="nombre-jugador"></span></h3>
        <ul id="lista-campeonatos"></ul>
    </div>
@endsection