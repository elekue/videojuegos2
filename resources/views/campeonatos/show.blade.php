@extends('layouts.app')

@section('title', 'Detalle del Campeonato')

@section('content')
<div class="container">
    <h1>{{ $campeonato->nombre }}</h1>

    <ul>
        <li><strong>Localidad:</strong> {{ $campeonato->localidad }}</li>
        <li><strong>Tipo:</strong> {{ $campeonato->tipo }}</li>
        <li><strong>Normas:</strong> {{ $campeonato->normas }}</li>
        <li><strong>Comienzo:</strong> {{ $campeonato->fecha_comienzo }}</li>
        <li><strong>Fin:</strong> {{ $campeonato->fechaFin }}</li>
        <li><strong>Tipo:</strong> {{ ucfirst($campeonato->tipo) }}</li>
        <li><strong>Premio:</strong> {{ $campeonato->premio }}</li>
       <li><strong>Normas:</strong> {{ $campeonato->normas }}</li>
    </ul>

    
   {{-- Mostrar mensajes de sesión --}}
   @if(session('success'))
   <div style="color: green">{{ session('success') }}</div>
@endif

@if(session('error'))
   <div style="color: red">{{ session('error') }}</div>
@endif

{{-- Botón para apuntarse si está autenticado y no es admin --}}
    @auth
        @if(!Auth::user()->isAdmin())
        @if(session('error'))
    <div style="color: red">{{ session('error') }}</div>
@endif
            <form action="{{ route('participaciones.store') }}" method="POST">
                @csrf
                <input type="hidden" name="campeonato_id" value="{{ $campeonato->id }}">
                <button type="submit">Apuntarme</button>
            </form>
        @endif
    @endauth

    {{-- Botones para admins --}}
    @if(Auth::check() && Auth::user()->isAdmin())
        <a href="{{ route('campeonatos.edit', $campeonato) }}">Editar</a>

        <form action="{{ route('campeonatos.destroy', $campeonato) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('¿Estás seguro de que quieres eliminar este campeonato?')">Eliminar</button>
        </form>
    @endif

    <br><br>
    <a href="{{ route('campeonatos.index') }}">← Volver al listado</a>
</div>
@endsection