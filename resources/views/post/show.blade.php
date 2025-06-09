@extends('layouts.app')
@section('title', 'Ver Mas')
@section('content')
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-3xl font-bold mb-4">{{ $post->title }}</h2>
        @if($post->poster)
            <img src="{{ asset('storage/' . $post->poster) }}" alt="Imagen" class="w-full mb-4 rounded">
        @endif
        <div>
            <p>{{ $post->content }}</p>
        </div>
        @auth
            <div class="mt-4 space-x-2">
                <a href="{{ route('posts.edit', $post->id) }}" class="text-blue-600 hover:underline">Editar</a>
                <a href="{{ route('posts.delete', $post->id) }}" class="text-red-600 hover:underline">Eliminar</a>
            </div>
        @endauth
    </div>
@endsection