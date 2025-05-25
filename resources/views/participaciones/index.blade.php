<!-- resources/views/participaciones/index.blade.php -->

@extends('layouts.app')

@section('content')

    <h1>Listado de Participaciones</h1>

    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    @if($participaciones->isEmpty())
        <p>No hay participaciones aún.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Campeonato</th>
                    <th>Jugador</th>
                    <th>Puesto</th>
                    <th>Premio</th>
                    @if(auth()->user()->isAdmin())
                        <th>Acciones</th>
                    @endif
                </tr>
            </thead>

            <tbody>
                @foreach ($participaciones as $participacion)
                    <tr>
                        <td>{{ $participacion->campeonato->nombre }}</td>
                        <td>{{ $participacion->jugador->nick }}</td>
                        <td>{{ $participacion->puesto ?? '-' }}</td>
                        <td>{{ $participacion->premio ?? '-' }} €</td>
                        
                        @if(auth()->user()->isAdmin())
                            <td>
                                <a href="{{ route('participaciones.edit', $participacion->id) }}">Editar</a>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

@endsect