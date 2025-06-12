<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // Mostrar lista de recetas, con opción de filtrar por categoría
    public function index(Request $request)
    {
        $query = Post::with('user')->where('habilitated', true);

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $posts = $query->latest()->get();
        $selectedCategory = $request->get('category');

        return view('post.index', compact('posts', 'selectedCategory'));
    }

    // Mostrar una receta específica
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    // Mostrar formulario para crear una receta
    public function create()
    {
        return view('post.create');
    }

    // Guardar nueva receta en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:255',
            'category' => 'required|in:comida,postre',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'content' => 'required|string|min:10',
        ]);

        $path = null;
        if ($request->hasFile('poster')) {
            $path = $request->file('poster')->store('posters', 'public');
        }

        Post::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'category' => $request->category,
            'poster' => $path,
            'content' => $request->content,
            'habilitated' => true,
        ]);

        return redirect()->route('posts.index')->with('success', 'Receta creada correctamente.');
    }

    // Mostrar formulario para editar una receta
    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    // Actualizar una receta existente
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:255',
            'category' => 'required|in:comida,postre',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'content' => 'required|string|min:10',
        ]);

        if ($request->hasFile('poster')) {
            if ($post->poster) {
                Storage::disk('public')->delete($post->poster);
            }
            $post->poster = $request->file('poster')->store('posters', 'public');
        }

        $post->update([
            'title' => $request->title,
            'category' => $request->category,
            'content' => $request->content,
        ]);

        return redirect()->route('posts.index')->with('success', 'Receta actualizada correctamente.');
    }

    // Eliminar una receta
    public function destroy(Post $post)
    {
        if ($post->poster) {
            Storage::disk('public')->delete($post->poster);
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Receta eliminada correctamente.');
    }

    // Mostrar confirmación antes de eliminar
    public function confirmDelete(Post $post)
    {
        return view('post.delete', compact('post'));
    }
}
