<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ComentarioController;

// Ruta principal
Route::get('/', [PostController::class, 'index'])->name('home');

// Rutas de autenticación
Auth::routes();

// Ruta para redirigir después del login (en caso de que Laravel redirija a /home)
Route::get('/home', function () {
    return redirect()->route('dashboard');
});

// Rutas protegidas con autenticación
Route::middleware('auth')->group(function () {
    // Publicaciones
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

    // Perfil
    Route::get('/perfil', [PerfilController::class, 'index'])->name('perfil');
    Route::put('/perfil/actualizar', [PerfilController::class, 'actualizar'])->name('perfil.actualizar');

    // Comentarios
    Route::post('/comentarios', [ComentarioController::class, 'store'])->name('comentarios.store');

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Página de contacto (sin autenticación)
Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');
