@extends('layouts.app')

@section('title', 'Sabores Argentinos - Descubre las mejores recetas tradicionales')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-orange-600 via-red-600 to-pink-600 overflow-hidden">
        <!-- Patrón de fondo -->
        <div class="absolute inset-0 bg-black opacity-40"></div>
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="20" height="20" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Ccircle cx="3" cy="3" r="1"/%3E%3C/g%3E%3C/svg%3E');"></div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-32">
            <div class="text-center">
                <!-- Badge -->
                <div class="mb-8">
                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-white bg-opacity-20 text-white backdrop-blur">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                        </svg>
                        Recetas Auténticas Argentinas
                    </span>
                </div>

                <!-- Título principal -->
                <h1 class="text-5xl md:text-7xl font-display font-bold text-white mb-6 leading-tight">
                    Sabores que 
                    <span class="bg-gradient-to-r from-yellow-300 to-orange-300 bg-clip-text text-transparent">
                        Conectan
                    </span>
                    <br>Generaciones
                </h1>
                
                <!-- Subtítulo -->
                <p class="text-xl md:text-2xl text-orange-100 mb-10 max-w-3xl mx-auto leading-relaxed">
                    Descubre las recetas tradicionales que han pasado de generación en generación. 
                    Comparte tus secretos culinarios y mantén viva nuestra herencia gastronómica.
                </p>

                <!-- Call to action buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <a href="{{ route('posts.index') }}" class="inline-flex items-center px-8 py-4 border border-transparent text-lg font-medium rounded-full text-orange-600 bg-white hover:bg-orange-50 transition-all duration-200 transform hover:scale-105 shadow-lg">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                        </svg>
                        Explorar Recetas
                    </a>
                    
                    @auth
                        <a href="{{ route('posts.create') }}" class="inline-flex items-center px-8 py-4 border-2 border-white text-lg font-medium rounded-full text-white hover:bg-white hover:text-orange-600 transition-all duration-200 transform hover:scale-105">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Compartir Mi Receta
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="inline-flex items-center px-8 py-4 border-2 border-white text-lg font-medium rounded-full text-white hover:bg-white hover:text-orange-600 transition-all duration-200 transform hover:scale-105">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                            </svg>
                            Únete a la Comunidad
                        </a>
                    @endauth
                </div>
            </div>
        </div>

        <!-- Floating elements -->
        <div class="absolute top-20 left-10 w-20 h-20 bg-yellow-300 rounded-full opacity-20 animate-bounce" style="animation-delay: 0s;"></div>
        <div class="absolute top-40 right-20 w-16 h-16 bg-orange-300 rounded-full opacity-20 animate-bounce" style="animation-delay: 1s;"></div>
        <div class="absolute bottom-20 left-20 w-12 h-12 bg-red-300 rounded-full opacity-20 animate-bounce" style="animation-delay: 2s;"></div>
    </section>



    <!-- Recetas Destacadas -->
    <section class="py-16 bg-gradient-to-br from-orange-50 to-amber-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-display font-bold text-gray-900 mb-4">Recetas Más Populares</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Descubre las recetas favoritas de nuestra comunidad, probadas y amadas por generaciones.
                </p>
            </div>

            @php
                $featuredPosts = \App\Models\Post::with('user')->where('habilitated', true)->latest()->take(3)->get();
            @endphp

            @if($featuredPosts->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($featuredPosts as $post)
                        <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                            @if($post->poster)
                                <div class="h-48 bg-cover bg-center" style="background-image: url('{{ asset('storage/' . $post->poster) }}')"></div>
                            @else
                                <div class="h-48 bg-gradient-to-br from-orange-400 to-red-500 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18l-1 14H4L3 3zm0 0l1-1h16l1 1M8 8v4m4-4v4m4-4v4"></path>
                                    </svg>
                                </div>
                            @endif
                            
                            <div class="p-6">
                                <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $post->title }}</h3>
                                <p class="text-gray-600 text-sm mb-4">{{ Str::limit($post->content, 80) }}</p>
                                
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-2">
                                        <div class="w-8 h-8 bg-gradient-to-br from-orange-400 to-red-500 rounded-full flex items-center justify-center">
                                            <span class="text-white text-xs font-semibold">{{ substr($post->user->name, 0, 1) }}</span>
                                        </div>
                                        <span class="text-sm text-gray-500">{{ $post->user->name }}</span>
                                    </div>
                                    
                                    <a href="{{ route('posts.show', $post) }}" class="inline-flex items-center text-orange-600 hover:text-orange-700 font-medium text-sm">
                                        Ver receta
                                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <div class="text-center mt-12">
                    <a href="{{ route('posts.index') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-full text-white bg-gradient-to-r from-orange-500 to-red-600 hover:from-orange-600 hover:to-red-700 transition-all duration-200 transform hover:scale-105">
                        Ver Todas las Recetas
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                </div>
            @else
                <div class="text-center py-12">
                    <div class="w-24 h-24 bg-gradient-to-br from-orange-500 to-red-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-900 mb-4">¡Sé el primero en compartir!</h3>
                    <p class="text-gray-600 mb-8 max-w-md mx-auto">
                        Nuestra comunidad está esperando tus recetas tradicionales favoritas.
                    </p>
                    @auth
                        <a href="{{ route('posts.create') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-full text-white bg-gradient-to-r from-orange-500 to-red-600 hover:from-orange-600 hover:to-red-700 transition-all duration-200 transform hover:scale-105">
                            Crear Primera Receta
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-full text-white bg-gradient-to-r from-orange-500 to-red-600 hover:from-orange-600 hover:to-red-700 transition-all duration-200 transform hover:scale-105">
                            Únete Ahora
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                            </svg>
                        </a>
                    @endauth
                </div>
            @endif
        </div>
    </section>

    <!-- Call to Action Final -->
    <section class="py-16 bg-gradient-to-r from-orange-600 to-red-600">
        <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-display font-bold text-white mb-6">
                ¿Tenés una receta familiar especial?
            </h2>
            <p class="text-xl text-orange-100 mb-8 max-w-2xl mx-auto">
                Compartila con nuestra comunidad y ayudá a preservar los sabores que nos conectan con nuestras raíces.
            </p>
            
            @auth
                <a href="{{ route('posts.create') }}" class="inline-flex items-center px-8 py-4 border border-transparent text-lg font-medium rounded-full text-orange-600 bg-white hover:bg-orange-50 transition-all duration-200 transform hover:scale-105 shadow-lg">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Compartir Mi Receta
                </a>
            @else
                <div class="space-y-4">
                    <a href="{{ route('register') }}" class="inline-flex items-center px-8 py-4 border border-transparent text-lg font-medium rounded-full text-orange-600 bg-white hover:bg-orange-50 transition-all duration-200 transform hover:scale-105 shadow-lg">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                        </svg>
                        Registrate Gratis
                    </a>
                    <p class="text-orange-200 text-sm">
                        ¿Ya tenés cuenta? <a href="{{ route('login') }}" class="text-white underline hover:no-underline">Iniciá sesión</a>
                    </p>
                </div>
            @endif
        </div>
    </section>
@endsection
