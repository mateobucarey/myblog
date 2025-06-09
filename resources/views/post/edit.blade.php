@extends('layouts.app')
@section('title', 'Editar Receta - Sabores Argentinos')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-orange-50 to-amber-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Botón de regreso -->
        <div class="mb-6">
            <a href="{{ route('posts.show', $post) }}" class="inline-flex items-center text-orange-600 hover:text-orange-800 font-medium transition duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Volver a la receta
            </a>
        </div>

        <!-- Header Card -->
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden mb-6">
            <div class="bg-gradient-to-r from-orange-500 to-red-600 px-6 py-8">
                <div class="text-center">
                    <div class="w-20 h-20 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                    </div>
                    <h1 class="text-4xl font-display font-bold text-white mb-2">Editar Receta</h1>
                    <p class="text-orange-100 text-lg">Actualiza tu receta tradicional</p>
                </div>
            </div>
        </div>

        <!-- Main Form Card -->
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
            <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="p-8">
                    <!-- Current Recipe Info -->
                    <div class="mb-8 p-4 bg-gradient-to-r from-orange-50 to-red-50 rounded-xl border border-orange-200">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-orange-400 to-red-500 rounded-full flex items-center justify-center">
                                <span class="text-white font-semibold">{{ substr($post->user->name, 0, 1) }}</span>
                            </div>
                            <div>
                                <p class="font-medium text-gray-800">Editando receta de: <strong>{{ $post->user->name }}</strong></p>
                                <p class="text-sm text-gray-600">Creada: {{ $post->created_at->format('d/m/Y \a \l\a\s H:i') }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Título -->
                    <div class="mb-8">
                        <label for="title" class="block text-sm font-semibold text-gray-700 mb-3">
                            <svg class="w-5 h-5 inline mr-2 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.99 1.99 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                            Título de la Receta
                        </label>
                        <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" 
                               class="w-full border-2 rounded-xl p-4 @error('title') border-red-500 @else border-gray-300 @enderror focus:border-orange-500 focus:outline-none transition duration-200 text-lg" 
                               placeholder="Ej: Empanadas de carne tradicionales" required>
                        @error('title')
                            <p class="text-red-500 text-sm mt-2 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Categoría -->
                    <div class="mb-8">
                        <label for="category" class="block text-sm font-semibold text-gray-700 mb-3">
                            <svg class="w-5 h-5 inline mr-2 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.707A1 1 0 013 7V4z"></path>
                            </svg>
                            Categoría
                        </label>
                        <select name="category" id="category" required
                                class="w-full border-2 rounded-xl p-4 @error('category') border-red-500 @else border-gray-300 @enderror focus:border-orange-500 focus:outline-none transition duration-200 text-lg bg-white">
                            <option value="">Seleccioná una categoría</option>
                            <option value="comida" {{ old('category', $post->category) == 'comida' ? 'selected' : '' }}>🥘 Comida</option>
                            <option value="postre" {{ old('category', $post->category) == 'postre' ? 'selected' : '' }}>🍰 Postre</option>
                        </select>
                        @error('category')
                            <p class="text-red-500 text-sm mt-2 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Imagen -->
                    <div class="mb-8">
                        <label for="poster" class="block text-sm font-semibold text-gray-700 mb-3">
                            <svg class="w-5 h-5 inline mr-2 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Imagen de la Receta
                        </label>
                        
                        <!-- Imagen actual -->
                        @if($post->poster)
                            <div class="mb-4">
                                <p class="text-sm text-gray-600 mb-2">Imagen actual:</p>
                                <div class="relative">
                                    <img src="{{ asset('storage/' . $post->poster) }}" alt="Imagen actual" 
                                         class="w-full max-w-md mx-auto rounded-xl shadow-lg">
                                    <div class="absolute top-2 right-2 bg-orange-500 text-white px-2 py-1 rounded-lg text-xs font-medium">
                                        Actual
                                    </div>
                                </div>
                            </div>
                        @endif
                        
                        <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-orange-400 transition duration-200">
                            <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                            </svg>
                            <label for="poster" class="cursor-pointer">
                                <span class="text-orange-600 font-medium hover:text-orange-700">
                                    {{ $post->poster ? 'Cambiar imagen' : 'Subir nueva imagen' }}
                                </span>
                                <input type="file" name="poster" id="poster" accept="image/*" class="hidden">
                            </label>
                            <p class="text-xs text-gray-500 mt-2">Formatos: JPG, PNG, GIF, WEBP • Máximo 2MB</p>
                        </div>
                        @error('poster')
                            <p class="text-red-500 text-sm mt-2 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Contenido -->
                    <div class="mb-8">
                        <label for="content" class="block text-sm font-semibold text-gray-700 mb-3">
                            <svg class="w-5 h-5 inline mr-2 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Receta Completa
                        </label>
                        <textarea name="content" id="content" rows="12" 
                                  class="w-full border-2 rounded-xl p-4 @error('content') border-red-500 @else border-gray-300 @enderror focus:border-orange-500 focus:outline-none transition duration-200 resize-none" 
                                  placeholder="Describe la receta completa, incluyendo ingredientes y preparación..." required>{{ old('content', $post->content) }}</textarea>
                        <div class="mt-2 flex justify-between items-center">
                            <p class="text-xs text-gray-500">
                                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Tip: Usá "Ingredientes:" y "Preparación:" para organizar mejor tu receta
                            </p>
                            <span class="text-xs text-gray-400" id="charCount">0 caracteres</span>
                        </div>
                        @error('content')
                            <p class="text-red-500 text-sm mt-2 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <!-- Footer con botones -->
                <div class="bg-gradient-to-r from-orange-50 to-red-50 px-8 py-6 border-t border-orange-200">
                    <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                        <div class="text-sm text-gray-600 flex items-center">
                            <svg class="w-4 h-4 mr-2 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                            Los cambios se guardarán de forma segura
                        </div>
                        
                        <div class="flex items-center space-x-4">
                            <a href="{{ route('posts.show', $post) }}" 
                               class="px-6 py-3 bg-gray-500 hover:bg-gray-600 text-white font-medium rounded-lg transition-all duration-200 transform hover:scale-105">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                Cancelar
                            </a>
                            <button type="submit" 
                                    class="px-8 py-3 bg-gradient-to-r from-orange-500 to-red-600 hover:from-orange-600 hover:to-red-700 text-white font-semibold rounded-lg transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Actualizar Receta
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript para contador de caracteres -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const contentTextarea = document.getElementById('content');
    const charCount = document.getElementById('charCount');
    
    function updateCharCount() {
        const count = contentTextarea.value.length;
        charCount.textContent = count.toLocaleString() + ' caracteres';
    }
    
    contentTextarea.addEventListener('input', updateCharCount);
    updateCharCount(); // Contar caracteres iniciales
    
    // Preview de imagen
    const posterInput = document.getElementById('poster');
    posterInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                // Aquí podrías agregar una preview de la nueva imagen si quisieras
                console.log('Archivo seleccionado:', file.name);
            };
            reader.readAsDataURL(file);
        }
    });
});
</script>
@endsection