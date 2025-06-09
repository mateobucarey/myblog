@extends('layouts.app')
@section('title', $post->title)

@section('content')
<div class="min-h-screen bg-gradient-to-br from-orange-50 to-amber-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Botón de regreso -->
        <div class="mb-6">
            <a href="{{ route('posts.index') }}" class="inline-flex items-center text-orange-600 hover:text-orange-800 font-medium transition duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Volver a recetas
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
            <!-- Header con información del autor -->
            <div class="bg-gradient-to-r from-orange-50 to-red-50 px-6 py-6 border-b border-orange-100">
                <div class="flex justify-between items-start">
                    <div>
                        <h1 class="text-4xl font-display font-bold text-gray-800 mb-3">{{ $post->title }}</h1>
                        <div class="flex items-center text-sm text-gray-600 space-x-4">
                            <div class="flex items-center space-x-2">
                                <div class="w-10 h-10 bg-gradient-to-br from-orange-400 to-red-500 rounded-full flex items-center justify-center">
                                    <span class="text-white font-semibold text-sm">{{ substr($post->user->name, 0, 1) }}</span>
                                </div>
                                <span>Por: <strong class="text-gray-800">{{ $post->user->name }}</strong></span>
                            </div>
                            <span>•</span>
                            <span>Publicado: {{ $post->created_at->format('d/m/Y \a \l\a\s H:i') }}</span>
                            @if($post->updated_at->ne($post->created_at))
                                <span>•</span>
                                <span>Actualizado: {{ $post->updated_at->format('d/m/Y') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    @auth
                        <div class="flex space-x-3">
                            <a href="{{ route('posts.edit', $post) }}" class="inline-flex items-center px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-medium rounded-lg transition-all duration-200 transform hover:scale-105">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                Editar
                            </a>
                            <a href="{{ route('posts.delete', $post) }}" class="inline-flex items-center px-4 py-2 bg-red-500 hover:bg-red-600 text-white text-sm font-medium rounded-lg transition-all duration-200 transform hover:scale-105">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                Eliminar
                            </a>
                        </div>
                    @endauth
                </div>
            </div>

            <!-- Imagen de la receta -->
            @if($post->poster)
                <div class="px-6 py-6">
                    <img src="{{ asset('storage/' . $post->poster) }}" alt="Imagen de {{ $post->title }}"
                         class="w-full max-w-3xl mx-auto rounded-xl shadow-lg">
                </div>
            @endif

            <!-- Contenido de la receta -->
            <div class="px-6 pb-8">
                <div class="prose prose-lg max-w-none text-gray-800 leading-relaxed">
                    {!! preg_replace([
                        '/\b(Ingredientes):/i',
                        '/\b(Preparación|Receta):/i',
                        '/\n/'
                    ], [
                        '<h2 class="text-2xl font-display font-bold text-orange-700 mt-8 mb-4 border-b-2 border-orange-200 pb-2">$1:</h2>',
                        '<h2 class="text-2xl font-display font-bold text-red-700 mt-8 mb-4 border-b-2 border-red-200 pb-2">$1:</h2>',
                        '<br class="mb-2">'
                    ], e($post->content)) !!}
                </div>
            </div>

            <!-- Footer con información adicional -->
            <div class="bg-gradient-to-r from-orange-50 to-red-50 px-6 py-4 border-t border-orange-100">
                <div class="flex justify-between items-center text-sm text-gray-600">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-2 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                        Receta compartida en Sabores Argentinos
                    </span>
                    <div class="text-xs bg-orange-100 text-orange-700 px-3 py-1 rounded-full">
                        Receta #{{ $post->id }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Navegación a otras recetas -->
        <div class="mt-8 text-center">
            <a href="{{ route('posts.index') }}" 
               class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-orange-500 to-red-600 hover:from-orange-600 hover:to-red-700 text-white font-semibold rounded-full transition-all duration-200 transform hover:scale-105 shadow-lg">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                </svg>
                Ver Más Recetas
            </a>
        </div>
    </div>
</div>
@endsection
