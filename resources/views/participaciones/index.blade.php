<!-- resources/views/participaciones/index.blade.php -->

@extends('layouts.app')

@section('content')

<h2 style="color: #70b7ff;">Listado de Participaciones</h2>

    @if(session('success'))
    <div style="background-color: #d4edda; color: #155724; padding: 0.75rem 1rem; border-radius: 6px; margin-bottom: 1rem; border: 1px solid #c3e6cb;">
        {{ session('success') }}
    </div>
    @endif

    @if($participaciones->isEmpty())
    <p style="color: #ccc; font-style: italic;">No hay participaciones aún.</p>
    @else
        <div class="participaciones-grid">
                @foreach ($participaciones as $participacion)
                   <div class="campeonato-card">
                    
                        <p>Campeonato: {{ $participacion->campeonato->nombre }}</td>
                        <p>nick: {{ $participacion->jugador->nick }}</td>
                        <p>Puesto: {{ $participacion->puesto ?? '-' }}</td>
                            <p>Premio: {{ $participacion->campeonato->premio ?? '-' }} €</p>
                        
                        @if(auth()->user()->isAdmin())
                            
                        <div class="botones-campeonato">
                            <a href="{{ route('participaciones.edit', $participacion) }}" class="btn btn-editar">Editar</a>
                        </div>   
                        @endif
                    </div>
                @endforeach
        </div>   
    @endif

@endsection