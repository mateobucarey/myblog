@extends('layouts.app')

@section('title', 'Iniciar Sesión - Sabores Argentinos')

@section('content')
<div class="min-h-screen flex">
    <!-- Lado izquierdo - Imagen/Branding -->
    <div class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-orange-600 via-red-600 to-pink-600 relative overflow-hidden">
        <!-- Patrón de fondo -->
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="40" height="40" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Ccircle cx="10" cy="10" r="2"/%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/svg%3E');"></div>
        
        <div class="relative z-10 flex flex-col justify-center items-center text-center text-white p-12">
            <!-- Logo grande -->
            <div class="mb-8">
                <div class="w-24 h-24 bg-white bg-opacity-20 rounded-full flex items-center justify-center backdrop-blur mb-6">
                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18l-1 14H4L3 3zm0 0l1-1h16l1 1M8 8v4m4-4v4m4-4v4"></path>
                    </svg>
                </div>
                <h1 class="font-display text-4xl font-bold mb-3">Sabores Argentinos</h1>
                <p class="text-xl text-orange-100">Recetas Tradicionales</p>
            </div>
            
            <!-- Mensaje de bienvenida -->
            <div class="max-w-md">
                <h2 class="text-2xl font-semibold mb-4">¡Bienvenido de vuelta!</h2>
                <p class="text-orange-100 text-lg leading-relaxed">
                    Conectate con nuestra comunidad y sigue compartiendo esas recetas tradicionales que nos conectan con nuestras raíces.
                </p>
            </div>
        </div>

        <!-- Elementos decorativos -->
        <div class="absolute top-20 left-10 w-20 h-20 bg-yellow-300 rounded-full opacity-20 animate-pulse"></div>
        <div class="absolute bottom-20 right-20 w-16 h-16 bg-orange-300 rounded-full opacity-20 animate-pulse" style="animation-delay: 1s;"></div>
        <div class="absolute top-1/2 right-10 w-12 h-12 bg-red-300 rounded-full opacity-20 animate-pulse" style="animation-delay: 2s;"></div>
    </div>

    <!-- Lado derecho - Formulario -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 bg-gradient-to-br from-orange-50 to-amber-50">
        <div class="w-full max-w-md">
            <!-- Header del formulario -->
            <div class="text-center mb-8">
                <!-- Logo móvil (solo visible en pantallas pequeñas) -->
                <div class="lg:hidden mb-6">
                    <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-red-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18l-1 14H4L3 3zm0 0l1-1h16l1 1M8 8v4m4-4v4m4-4v4"></path>
                        </svg>
                    </div>
                    <h1 class="font-display text-2xl font-bold text-gray-800">Sabores Argentinos</h1>
                </div>
                
                <h2 class="text-3xl font-display font-bold text-gray-800 mb-2">Iniciar Sesión</h2>
                <p class="text-gray-600">Ingresá a tu cuenta para compartir tus recetas</p>
            </div>

            <!-- Mensajes de estado y errores -->
            @if (session('status'))
                <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-400 rounded-r-lg">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-green-800">{{ session('status') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-400 rounded-r-lg">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            @foreach ($errors->all() as $error)
                                <p class="text-sm text-red-800">{{ $error }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <!-- Formulario -->
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Campo Email -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                        Correo electrónico
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                            </svg>
                        </div>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                            class="w-full pl-10 pr-4 py-3 border-2 border-gray-300 rounded-lg focus:border-orange-500 focus:ring-orange-500 focus:outline-none transition duration-200 @error('email') border-red-500 @enderror"
                            placeholder="tu@email.com">
                    </div>
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Campo Contraseña -->
                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                        Contraseña
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <input id="password" type="password" name="password" required
                            class="w-full pl-10 pr-4 py-3 border-2 border-gray-300 rounded-lg focus:border-orange-500 focus:ring-orange-500 focus:outline-none transition duration-200 @error('password') border-red-500 @enderror"
                            placeholder="Tu contraseña">
                    </div>
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Recordarme y Olvidé contraseña -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="h-4 w-4 text-orange-600 focus:ring-orange-500 border-gray-300 rounded">
                        <span class="ml-2 text-sm text-gray-600">Recordarme</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-orange-600 hover:text-orange-700 font-medium transition duration-200">
                            ¿Olvidaste tu contraseña?
                        </a>
                    @endif
                </div>

                <!-- Botón de inicio de sesión -->
                <button type="submit"
                    class="w-full bg-gradient-to-r from-orange-500 to-red-600 hover:from-orange-600 hover:to-red-700 text-white font-semibold py-3 px-4 rounded-lg transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl">
                    <span class="flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                        </svg>
                        Iniciar Sesión
                    </span>
                </button>

                <!-- Separador -->
                <div class="relative my-6">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-gradient-to-br from-orange-50 to-amber-50 text-gray-500">¿No tenés cuenta?</span>
                    </div>
                </div>

                <!-- Link a registro -->
                <div class="text-center">
                    <a href="{{ route('register') }}" 
                       class="inline-flex items-center justify-center w-full border-2 border-orange-500 text-orange-600 hover:bg-orange-500 hover:text-white font-semibold py-3 px-4 rounded-lg transition-all duration-200 transform hover:scale-105">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                        </svg>
                        Crear cuenta nueva
                    </a>
                </div>

                <!-- Volver al inicio -->
                <div class="text-center pt-4">
                    <a href="{{ route('home') }}" class="inline-flex items-center text-sm text-gray-500 hover:text-orange-600 transition duration-200">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        Volver al inicio
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
