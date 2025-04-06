<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PerfilController;

/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/',[PostController::class,'index']);

Auth::routes();Route::middleware('auth')->group(function () {
    //crear publicacion
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    //editar publicacion 
    Route::get('/posts/{post}/edit',[PostController::class,'edit'])->name('posts.edit');
    Route::put('/posts/{post}',[PostController::class,'update'])->name('posts.update');
    //eliminar publicacion
    Route::delete('posts/{post}',[PostController::class,'destroy'])->name('posts.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::get('/perfil', function () {
    return view('perfil');
})->middleware('auth')->name('perfil');

Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');

Route::middleware('auth')->group(function(){
    Route::get('/perfil',[PerfilController::class,'index'])->name('perfil');

    //para actualizar 
    Route::put('perfil/actualizar',[PerfilController::class,'actualizar'])->name('perfil.actualizar');
});
