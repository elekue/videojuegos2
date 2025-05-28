@extends('layouts.app')

@section('content')
    <div class="jugador-card">
        <h1>{{ $jugador->nick }}</h1>

        <h3>Campeonatos en los que ha participado:</h3>
        <ul>
            @foreach($jugador->participaciones as $participacion)
                <li>{{ $participacion->campeonato->nombre }} - Puesto: {{ $participacion->puesto }}</li>
            @endforeach
        </ul>
    </div>

    <a href="{{ route('jugadores.index') }}" class="btn btn-volver">Volver a la lista</a>
@endsection