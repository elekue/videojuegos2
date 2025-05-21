<nav>
    <a href="{{ route('campeonatos.index') }}">Campeonatos</a>
    <a href="{{ route('jugadores.index') }}">Jugadores</a>
    <a href="{{ route('participaciones.index') }}">Participaciones</a>


@auth
        <span>Hola, {{ auth()->user()->name }}</span>
        <form method="POST" action="{{ route('logout') }}" style="display:inline">
            @csrf
            <button type="submit" style="background:none; border:none; color:#00f; cursor:pointer; text-decoration:underline; padding:0; font:inherit;">
                Cerrar sesión
            </button>
        </form>
    @else
        <a href="{{ route('login') }}">Login</a>
    @endauth
</nav>