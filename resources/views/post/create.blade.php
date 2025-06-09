@extends('layouts.app')
@section('title', 'Crear Receta')
@section('content')
    <h2 class="text-2xl font-semibold mb-4">Crear Nueva Receta</h2>
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow">
        @csrf
        <div class="mb-4">
            <label for="title" class="block font-bold">Título</label>
            <input type="text" name="title" class="w-full border rounded p-2" required>
        </div>
        <div class="mb-4">
            <label for="poster" class="block font-bold">Imagen</label>
            <input type="file" name="poster" class="w-full">
        </div>
        <div class="mb-4">
            <label for="content" class="block font-bold">Contenido</label>
            <textarea name="content" rows="6" class="w-full border rounded p-2" required></textarea>
        </div>
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Publicar</button>
    </form>
@endsection