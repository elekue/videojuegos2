@extends('layouts.app')

@section('content')
    <h1>Listado de Jugadores</h1>
    <ul>
        @foreach($jugadores as $jugador)
            <li>{{ $jugador->nick }} - {{ $jugador->correo }}</li>
        @endforeach
    </ul>
@endsection