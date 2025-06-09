<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    // Listado de recetas
    public function getIndex()
    {
        $posts = Post::where('habilitated', true)->latest()->get();
        return view('post.index', compact('posts'));
    }

    // Ver detalles
    public function getShow($id)
    {
        $post = Post::findOrFail($id);
        return view('post.show', compact('post'));
    }

    // Formulario de creación
    public function getCreate()
    {
        return view('post.create');
    }

    // Guardar nueva receta
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'poster' => 'nullable|image|max:2048',
            'content' => 'required|string',
        ]);

        $path = null;
        if ($request->hasFile('poster')) {
            $path = $request->file('poster')->store('posters', 'public');
        }

        Post::create([
            'title' => $request->title,
            'poster' => $path,
            'content' => $request->content,
            'habilitated' => true,
        ]);

        return redirect()->route('posts.index')->with('success', 'Receta creada correctamente.');
    }

    // Formulario de edición
    public function getEdit($id)
    {
        $post = Post::findOrFail($id);
        return view('post.edit', compact('post'));
    }

    // Guardar cambios
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'poster' => 'nullable|image|max:2048',
            'content' => 'required|string',
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

    // Confirmar eliminación
    public function getDelete($id)
    {
        $post = Post::findOrFail($id);
        return view('post.delete', compact('post'));
    }

    // Eliminar receta
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if ($post->poster) {
            Storage::disk('public')->delete($post->poster);
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Receta eliminada correctamente.');
    }
}
