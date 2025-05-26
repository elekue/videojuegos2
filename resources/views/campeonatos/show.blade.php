@extends('layouts.app')

@section('title', 'Detalle del Campeonato')

@section('content')
<div class="campeonato-card">
    <h3>{{ $campeonato->nombre }}</h3>

  
        <p><strong>Localidad:</strong> {{ $campeonato->localidad }}</p>
         <p><strong>Tipo:</strong> {{ $campeonato->tipo }}</p>
        <p><strong>Normas:</strong> {{ $campeonato->normas }}</p>
        <p><strong>Comienzo:</strong> {{ $campeonato->fecha_comienzo }}</p>
        <p><strong>Fin:</strong> {{ $campeonato->fechaFin }}</p>
        <p><strong>Tipo:</strong> {{ ucfirst($campeonato->tipo) }}</p>
        <p><strong>Premio:</strong> {{ $campeonato->premio }}</p>
        <p><strong>Normas:</strong> {{ $campeonato->normas }}</p>
   

    
   {{-- Mostrar mensajes de sesión --}}
   @if(session('success'))
   <div style="color: green">{{ session('success') }}</div>
@endif

@if(session('error'))
   <div style="color: red">{{ session('error') }}</div>
@endif

{{-- Botón para apuntarse si está autenticado y no es admin --}}
    @auth
        @if(!Auth::user()->es_admin)
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
    @if(Auth::check() && Auth::user()->es_admin)
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