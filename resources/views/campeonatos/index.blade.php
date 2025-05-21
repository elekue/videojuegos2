@extends('layouts.app')

@section('title', 'Listado de Campeonatos')

@section('content')
    <div class="container">
{{-- Aquí va el bloque de login/logout --}}
    @if(Auth::check())
    <p>Hola, {{ Auth::user()->nombre }} | 
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
              @csrf
             <button type="submit">Cerrar sesión</button>
        </form>
        </p>
    @else
    <a href="{{ route('login') }}">Identificarse</a>
    @endif

        <h1>Campeonatos</h1>
        @if(Auth::check() && Auth::user()->isAdmin())
            <a href="{{ route('campeonatos.create') }}">Crear nuevo campeonato</a>
        @endif

        

        @if($campeonatos->isEmpty())
            <p>No hay campeonatos disponibles.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>

                        {{--<th>Fecha de inicio</th>
                        <th>Fecha de fin</th>--}}
                        <th>Localidad</th>
                        <th>Tipo</th>
                        <th>Normas</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($campeonatos as $campeonato)
                        <tr>
                            <td>{{ $campeonato->nombre }}</td>
                            {{--<td>{{ $campeonato->fecha_comienzo }}</td>
                            <td>{{ $campeonato->fechaFin }}</td>--}}
                            <td>{{ $campeonato->localidad }}</td>
                            <td>{{ $campeonato->tipo }}</td>
                            <td>{{ $campeonato->normas }}</td>
                            <td>
                                <a href="{{ route('campeonatos.show', $campeonato) }}">Ver</a> |
                            
                                @if(Auth::check() && Auth::user()->isAdmin())
                                    <a href="{{ route('campeonatos.edit', $campeonato) }}">Editar</a> |
                            
                                    <form action="{{ route('campeonatos.destroy', $campeonato) }}" method="POST" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                                    </form>
                                @endif
                            
                                @auth
                                
                                        <form action="{{ route('participaciones.store') }}" method="POST" style="display:inline;">
                                            @csrf
                                            <input type="hidden" name="campeonato_id" value="{{ $campeonato->id }}">
                                            <button type="submit">Apuntarse</button>
                                        </form>
                                    
                                @else
                                    <a href="{{ route('login') }}">Identificarse</a>
                                @endauth
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection