<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;

Route::get('/', [HomeController::class, 'getHome'])->name('home');

Route::get('/posts', [PostController::class, 'getIndex'])->name('posts.index');
Route::get('/post/show/{id}', [PostController::class, 'getShow'])->name('posts.show');

Route::get('/post/create', [PostController::class, 'getCreate'])->name('posts.create');
Route::post('/post/store', [PostController::class, 'store'])->name('posts.store');

Route::get('/post/edit/{id}', [PostController::class, 'getEdit'])->name('posts.edit');
Route::put('/post/update/{id}', [PostController::class, 'update'])->name('posts.update');

Route::get('/post/delete/{id}', [PostController::class, 'getDelete'])->name('posts.delete');
Route::delete('/post/destroy/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

// Login/Logout
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/logout', function () {
    return redirect('/');
})->name('logout');

require __DIR__.'/auth.php';