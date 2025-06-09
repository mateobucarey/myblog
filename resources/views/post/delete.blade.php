@extends('layouts.app')
@section('title', 'Eliminar Receta')
@section('content')
    <div class="bg-white p-6 rounded shadow text-center">
        <h2 class="text-xl font-bold mb-4">¿Estás seguro que deseas eliminar esta receta?</h2>
        <p class="mb-4 text-lg">{{ $post->title }}</p>
        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">Eliminar</button>
            <a href="{{ route('posts.index') }}" class="ml-4 text-gray-600 hover:underline">Cancelar</a>
        </form>
    </div>
@endsection