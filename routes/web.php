<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;

// Ruta de inicio - Página principal del sitio
Route::get('/', [HomeController::class, 'getHome'])->name('home');

// Rutas públicas para ver la lista de posts
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

// Agrupación de rutas que requieren autenticación (middleware 'auth')
Route::middleware('auth')->group(function () {

    // Mostrar formulario para crear un nuevo post
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

    // Almacenar un nuevo post en la base de datos
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

    // Mostrar formulario para editar un post existente
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

    // Actualizar un post existente
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');

    // Mostrar confirmación de eliminación de un post
    Route::get('/posts/{post}/delete', [PostController::class, 'confirmDelete'])->name('posts.delete');

    // Eliminar un post definitivamente
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});

// Ruta para mostrar un post individual (debe ir después de las rutas más específicas)
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

// Ruta para mostrar la vista de login (autenticación de usuario)
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Ruta para hacer logout y redirigir al home (simulado)
Route::get('/logout', function () {
    return redirect('/');
})->name('logout');

// Carga de rutas adicionales de autenticación (registro, login, etc.)
require __DIR__.'/auth.php';
