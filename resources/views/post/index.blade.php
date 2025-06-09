@extends('layouts.app')
@section('title', 'Recetas Publicadas - Sabores Argentinos')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-orange-50 to-amber-50">
    <!-- Header Section -->
    <div class="bg-white shadow-sm border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div>
                    <h1 class="text-4xl font-display font-bold text-gray-800 mb-2">Nuestras Recetas</h1>
                    <p class="text-gray-600 text-lg">Descubre los sabores tradicionales que conectan generaciones</p>
                </div>
                
                @auth
                    <a href="{{ route('posts.create') }}" 
                       class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-orange-500 to-red-600 hover:from-orange-600 hover:to-red-700 text-white font-semibold rounded-full transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Nueva Receta
                    </a>
                @else
                    <div class="text-center">
                        <p class="text-gray-600 mb-3">¿Tenés una receta para compartir?</p>
                        <a href="{{ route('register') }}" 
                           class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-orange-500 to-red-600 hover:from-orange-600 hover:to-red-700 text-white font-semibold rounded-full transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                            </svg>
                            Únete Ahora
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </div>

    <!-- Content Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        @if($posts->count() > 0)
            <!-- Stats Bar -->
            <div class="mb-8 text-center">
                <p class="text-gray-600">
                    <span class="font-semibold text-orange-600">{{ $posts->count() }}</span> 
                    {{ $posts->count() == 1 ? 'receta tradicional' : 'recetas tradicionales' }} para descubrir
                </p>
            </div>

            <!-- Posts Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
                @foreach($posts as $post)
                    <article class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                        <!-- Image Container -->
                        <div class="relative h-64 overflow-hidden">
                            @if($post->poster)
                                <img src="{{ asset('storage/' . $post->poster) }}" 
                                     alt="Imagen de {{ $post->title }}" 
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-orange-200 to-red-200 flex items-center justify-center">
                                    <div class="text-center">
                                        <svg class="w-16 h-16 text-orange-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18l-1 14H4L3 3zm0 0l1-1h16l1 1M8 8v4m4-4v4m4-4v4"></path>
                                        </svg>
                                        <p class="text-orange-600 font-medium">Receta tradicional</p>
                                    </div>
                                </div>
                            @endif
                            
                            <!-- Overlay gradient -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                        
                        <!-- Content -->
                        <div class="p-6">
                            <!-- Title -->
                            <h3 class="text-xl font-display font-bold text-gray-800 mb-3 line-clamp-2 group-hover:text-orange-600 transition-colors duration-200">
                                {{ $post->title }}
                            </h3>
                            
                            <!-- Description -->
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3 leading-relaxed">
                                {{ Str::limit(strip_tags($post->content), 120) }}
                            </p>
                            
                            <!-- Author and Date -->
                            <div class="flex items-center justify-between mb-4 pb-4 border-b border-gray-100">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-gradient-to-br from-orange-400 to-red-500 rounded-full flex items-center justify-center">
                                        <span class="text-white font-semibold text-sm">{{ substr($post->user->name, 0, 1) }}</span>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-700">{{ $post->user->name }}</p>
                                        <p class="text-xs text-gray-500">{{ $post->created_at->format('d M Y') }}</p>
                                    </div>
                                </div>
                                
                                @if($post->updated_at->ne($post->created_at))
                                    <span class="text-xs text-gray-400 bg-gray-100 px-2 py-1 rounded-full">
                                        Actualizado
                                    </span>
                                @endif
                            </div>
                            
                            <!-- Actions -->
                            <div class="flex items-center justify-between">
                                <a href="{{ route('posts.show', $post) }}" 
                                   class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-orange-500 to-red-600 hover:from-orange-600 hover:to-red-700 text-white text-sm font-medium rounded-lg transition-all duration-200 transform hover:scale-105">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    Ver Receta
                                </a>
                                
                                @auth
                                    <div class="flex items-center space-x-2">
                                        <a href="{{ route('posts.edit', $post) }}" 
                                           class="p-2 text-yellow-600 hover:text-yellow-700 hover:bg-yellow-50 rounded-lg transition-colors duration-200"
                                           title="Editar receta">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                        </a>
                                        <a href="{{ route('posts.delete', $post) }}" 
                                           class="p-2 text-red-600 hover:text-red-700 hover:bg-red-50 rounded-lg transition-colors duration-200"
                                           title="Eliminar receta">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </a>
                                    </div>
                                @endauth
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Load More Button (if needed in the future) -->
            <div class="text-center mt-12">
                <p class="text-gray-500 text-sm">
                    ¡Seguí explorando nuestras deliciosas recetas tradicionales!
                </p>
            </div>
            
        @else
            <!-- Empty State -->
            <div class="text-center py-16">
                <div class="max-w-md mx-auto">
                    <!-- Icon -->
                    <div class="w-24 h-24 bg-gradient-to-br from-orange-100 to-red-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                        </svg>
                    </div>
                    
                    <!-- Title and Description -->
                    <h3 class="text-2xl font-display font-bold text-gray-800 mb-4">
                        ¡Aún no hay recetas!
                    </h3>
                    <p class="text-gray-600 mb-8 leading-relaxed">
                        Nuestra comunidad está esperando que compartas esas recetas tradicionales 
                        que han pasado de generación en tu familia.
                    </p>
                    
                    <!-- Actions -->
                    @auth
                        <a href="{{ route('posts.create') }}" 
                           class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-orange-500 to-red-600 hover:from-orange-600 hover:to-red-700 text-white font-semibold rounded-full transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Compartir Primera Receta
                        </a>
                    @else
                        <div class="space-y-4">
                            <a href="{{ route('register') }}" 
                               class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-orange-500 to-red-600 hover:from-orange-600 hover:to-red-700 text-white font-semibold rounded-full transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                                </svg>
                                Únete y Comparte
                            </a>
                            <p class="text-gray-500 text-sm">
                                ¿Ya tenés cuenta? 
                                <a href="{{ route('login') }}" class="text-orange-600 hover:text-orange-700 font-medium">
                                    Iniciá sesión
                                </a>
                            </p>
                        </div>
                    @endauth
                </div>
            </div>
        @endif
    </div>
</div>

<!-- Add some custom CSS for line clamping -->
<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
@endsection