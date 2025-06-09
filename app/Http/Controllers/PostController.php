<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // Listado de recetas
    public function index()
    {
        $posts = Post::with('user')->where('habilitated', true)->latest()->get();
        return view('post.index', compact('posts'));
    }

    // Ver detalles
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    // Formulario de creación
    public function create()
    {
        return view('post.create');
    }

    // Guardar nueva receta
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:255',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'content' => 'required|string|min:10',
        ], [
            'title.required' => 'El título es obligatorio.',
            'title.min' => 'El título debe tener al menos 3 caracteres.',
            'title.max' => 'El título no puede exceder 255 caracteres.',
            'poster.image' => 'El archivo debe ser una imagen.',
            'poster.mimes' => 'La imagen debe ser de tipo: jpeg, png, jpg, gif, webp.',
            'poster.max' => 'La imagen no puede ser mayor a 2MB.',
            'content.required' => 'El contenido es obligatorio.',
            'content.min' => 'El contenido debe tener al menos 10 caracteres.',
        ]);

        $path = null;
        if ($request->hasFile('poster')) {
            $path = $request->file('poster')->store('posters', 'public');
        }

        Post::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'poster' => $path,
            'content' => $request->content,
            'habilitated' => true,
        ]);

        return redirect()->route('posts.index')->with('success', 'Receta creada correctamente.');
    }

    // Formulario de edición
    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    // Guardar cambios
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:255',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'content' => 'required|string|min:10',
        ], [
            'title.required' => 'El título es obligatorio.',
            'title.min' => 'El título debe tener al menos 3 caracteres.',
            'title.max' => 'El título no puede exceder 255 caracteres.',
            'poster.image' => 'El archivo debe ser una imagen.',
            'poster.mimes' => 'La imagen debe ser de tipo: jpeg, png, jpg, gif, webp.',
            'poster.max' => 'La imagen no puede ser mayor a 2MB.',
            'content.required' => 'El contenido es obligatorio.',
            'content.min' => 'El contenido debe tener al menos 10 caracteres.',
        ]);

        if ($request->hasFile('poster')) {
            // Borrar anterior si existe
            if ($post->poster) {
                Storage::disk('public')->delete($post->poster);
            }
            $post->poster = $request->file('poster')->store('posters', 'public');
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Receta actualizada correctamente.');
    }

    // Eliminar receta
    public function destroy(Post $post)
    {
        if ($post->poster) {
            Storage::disk('public')->delete($post->poster);
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Receta eliminada correctamente.');
    }

    // Confirmar eliminación (método adicional para mostrar confirmación)
    public function confirmDelete(Post $post)
    {
        return view('post.delete', compact('post'));
    }
}
