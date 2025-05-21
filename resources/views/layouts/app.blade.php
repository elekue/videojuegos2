<!DOCTYPE html>
<html lang="es">
<head>
    
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>@yield('title', 'Campeonatos')</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
   



<body>
    {{-- Encabezado con la barra de navegación --}}
    <header>
        {{-- Componente Blade que incluye el menú de navegación --}}
        <x-navigation />
    </header>

    {{-- Contenido principal de la página --}}
    <main>
        {{-- Aquí se inserta el contenido específico de cada vista --}}
        @yield('content')
    </main>

    {{-- Pie de página  --}}
    <x-footer />
</body>
</html>