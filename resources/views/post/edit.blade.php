@extends('layouts.app')
@section('title', 'Editar Receta')
@section('content')
    <h2 class="text-2xl font-semibold mb-4">Editar Receta</h2>
    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="title" class="block font-bold">Título</label>
            <input type="text" name="title" value="{{ $post->title }}" class="w-full border rounded p-2" required>
        </div>
        <div class="mb-4">
            <label for="poster" class="block font-bold">Imagen</label>
            @if($post->poster)
                <img src="{{ asset('storage/' . $post->poster) }}" alt="Imagen actual" class="w-48 mb-2">
            @endif
            <input type="file" name="poster" class="w-full">
        </div>
        <div class="mb-4">
            <label for="content" class="block font-bold">Contenido</label>
            <textarea name="content" rows="6" class="w-full border rounded p-2" required>{{ $post->content }}</textarea>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Actualizar</button>
    </form>
@endsection