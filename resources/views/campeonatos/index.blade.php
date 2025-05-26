@extends('layouts.app')

@section('title', 'Listado de Campeonatos')

@section('content')
    <div class="container">
        {{-- Bloque de login/logout --}}
        @if(Auth::check())
            <p>Hola, {{ Auth::user()->nombre }} 
                {{--<form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit">Cerrar sesión</button>
                </form>--}}
            </p>
        @else
            <a href="{{ route('login') }}">Identificarse</a>
        @endif

        <h1>Campeonatos</h1>

        @if(Auth::check() && Auth::user()->es_admin)
        <div class="crear-campeonato">
            <a href="{{ route('campeonatos.create') }}" class="btn btn-crear">+ Crear nuevo campeonato</a>
        </div>
        @endif

        @if($campeonatos->isEmpty())
            <p>No hay campeonatos disponibles.</p>
        @else
            <div class="campeonatos-grid">
                @foreach($campeonatos as $campeonato)
                    <div class="campeonato-card">
                        <h3>{{ $campeonato->nombre }}</h3>
                        <p>{{ $campeonato->localidad }}</p>

                        <div class="botones-campeonato">
                            <a href="{{ route('campeonatos.show', $campeonato) }}" class="btn btn-ver">Ver</a>

                            @if(Auth::check() && Auth::user()->es_admin)
                                | <a href="{{ route('campeonatos.edit', $campeonato) }}" class="btn btn-editar">Editar</a> |

                                <form action="{{ route('campeonatos.destroy', $campeonato) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-eliminar" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                                </form>
                            @endif

                            @auth
                            @if(!auth()->user()->es_admin)
                                <form action="{{ route('participaciones.store') }}" method="POST" style="display:inline;">
                                    @csrf
                                    <input type="hidden" name="campeonato_id" value="{{ $campeonato->id }}">
                                    <button type="submit" class="btn btn-ver">Apuntarse</button>
                                </form>
                                @endif
                            @endauth
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection