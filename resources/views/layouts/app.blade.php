<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Recetas Argentinas')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="bg-gray-800 p-4 flex justify-between items-center">
        <div>
<a href="{{ route('home') }}" class="flex items-center space-x-2">
    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-8 w-auto">
    <span class="text-white font-bold text-lg">Recetario</span>
</a>        </div>
        <div>
            <a href="{{ route('posts.index') }}" class="text-white hover:underline mr-4">Recetas</a>
            @auth
                <a href="{{ route('posts.create') }}" class="text-white hover:underline mr-4">Crear</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-white hover:underline">Salir</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-white hover:underline mr-4">Iniciar sesión</a>
                <a href="{{ route('register') }}" class="text-white hover:underline">Registrarse</a>
            @endauth
        </div>
    </nav>

    <!-- Contenido principal -->
    <main class="flex-1 container mx-auto px-4 py-6">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 text-gray-700 text-center py-6">
        <p class="text-sm">© {{ date('Y') }} Recetario Tradicional Argentino. Todos los derechos reservados.</p>
    </footer>

</body>
</html>
