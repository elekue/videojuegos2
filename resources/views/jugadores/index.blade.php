@extends('layouts.app')

@section('content')
    <h1>Listado de Jugadores</h1>
    <div class="jugadores-grid">
    
        @foreach($jugadores as $jugador)
        <div class="jugador-card"> {{-- <-- cada tarjeta --}}
            <h3>{{ $jugador->nick }}  </h3>
            <h4>{{ $jugador->email }}</h4>
        </div>
        @endforeach
    </div>
@endsection