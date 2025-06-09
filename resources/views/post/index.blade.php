@extends('layouts.app')
@section('title', 'Recetas Publicadas')
@section('content')
    <h2 class="text-2xl font-semibold mb-4">Recetas Publicadas</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($posts as $post)
            <div class="bg-white p-4 rounded shadow">
                @if($post->poster)
                    <img src="{{ asset('storage/' . $post->poster) }}" alt="Imagen de {{ $post->title }}" class="w-full h-48 object-cover mb-2 rounded">
                @endif
                <h3 class="text-xl font-bold">{{ $post->title }}</h3>
                <p class="truncate">{{ Str::limit($post->content, 100) }}</p>
                <a href="{{ route('posts.show', $post->id) }}" class="text-blue-600 hover:underline">Ver más</a>
            </div>
        @endforeach
    </div>
@endsection