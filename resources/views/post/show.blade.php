@extends('layouts.app')
@section('title', 'Ver Más')

@section('content')
    <div class="bg-white p-6 rounded shadow max-w-3xl mx-auto">
        <h2 class="text-3xl font-bold mb-6 text-center">{{ $post->title }}</h2>

        @if($post->poster)
            <div class="flex justify-center mb-6">
                <img src="{{ asset('storage/' . $post->poster) }}" alt="Imagen de la receta"
                     class="w-full max-w-md rounded shadow-md">
            </div>
        @endif

        <div class="text-gray-800 text-base leading-snug space-y-2">
            {!! preg_replace([
                '/\b(Ingredientes):/i',
                '/\b(Preparación|Receta):/i',
                '/\n/'
            ], [
                '<strong class="block text-lg mt-4 mb-1">$1:</strong>',
                '<strong class="block text-lg mt-4 mb-1">$1:</strong>',
                '<br>'
            ], e($post->content)) !!}
        </div>

        @auth
            <div class="mt-6 flex justify-center space-x-4">
                <a href="{{ route('posts.edit', $post->id) }}" class="text-blue-600 hover:underline font-semibold">Editar</a>
                <a href="{{ route('posts.delete', $post->id) }}" class="text-red-600 hover:underline font-semibold">Eliminar</a>
            </div>
        @endauth
    </div>
@endsection
