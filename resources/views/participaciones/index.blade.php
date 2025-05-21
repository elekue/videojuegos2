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
        <table border="1" cellpadding="8" cellspacing="0">
            <thead>
                <tr>
                    <th>Jugador</th>
                    <th>Campeonato</th>
                    <th>Año</th>
                    <th>Puesto</th>
                    <th>Premio</th>
                </tr>
            </thead>
            <tbody>
                @foreach($participaciones as $participacion)
                    <tr>
                        <td>{{ $participacion->jugador->nombre ?? 'Sin jugador' }}</td>
                        <td>{{ $participacion->campeonato->nombre ?? 'Sin campeonato' }}</td>
                        <td>{{ $participacion->anio }}</td>
                        <td>{{ $participacion->puesto }}</td>
                        <td>{{ $participacion->premio ?? 'N/A' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection