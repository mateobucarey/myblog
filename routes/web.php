<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;

Route::get('/', [HomeController::class, 'getHome'])->name('home');

// Rutas públicas para ver posts
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

// Rutas que requieren autenticación para crear, editar y eliminar
Route::middleware('auth')->group(function () {
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::get('/posts/{post}/delete', [PostController::class, 'confirmDelete'])->name('posts.delete');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});

// Ruta para mostrar posts individuales (debe ir después de las rutas específicas)
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

// Login/Logout
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/logout', function () {
    return redirect('/');
})->name('logout');

require __DIR__.'/auth.php';