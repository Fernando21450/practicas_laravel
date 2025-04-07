<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //metodo para mostrar el formulario de creacion 
    public function create(){
        return view('posts.create');
    }
    //guarda la nueva publicacion
    public function store(Request $request){
        $request->validate([
            'titulo'=>'required|max:255',
            'contenido'=>'required|string',
        ]);
        Post::create([
            'titulo'=>$request->titulo,
            'contenido'=>$request->contenido,
            'user_id'=>Auth::id(),
        ]);

        return redirect()->route('dashboard')->with('success','Publicacion creada con exito');
    }
    
    public function index()
    {
        $posts = Post::with('user')->latest()->get(); // Trae todos los posts con su autor
        return view('posts.index', compact('posts'));
    }

    //mostrar comentarios
    public function show(Post $post){
        return view('posts.show',compact('post'));
    }

    //mostrar el formulario de edicion de una publicacion 
    public function edit(Post $post){
        //verifica que el usuario sea el autor
        if($post->user_id!==Auth::id()){
            return redirect('/')->with('error','no tienes permiso para editar esta publicacion');
        }
        return view('posts.edit',compact('post'));
    }
    public function update(Request $request,Post $post){
        //verifica que el usuario sea el autor
        if ($post->user_id!==Auth::id()){
            return redirect('/')->with('error','no tienes permiso para actualizar esta publicacion');
        }

        $request->validate([
            'titulo'=>'required|max:255',
            'contenido'=>'required',
        ]);

        $post->update([
            'titulo'=> $request->titulo,
            'contenido'=>$request->contenido,
        ]);
        return redirect('/')->with('success','Publicacion actulizada con exito!!');
    }

    //eliminar publicacion
    public function destroy(Post $post){
        //verifica que el usuario sea el autor
        if($post->user_id!==Auth::id()){
            return redirect('/')->with('error','no tienes permiso para eliminar esta publicacion');
        }
        $post->delete();
        return redirect('/')->with('success','Publicacion eliminada con exito!!');
    }
}
