<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //
    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){
        $request->validate([
            'titulo'=>'required|max:255',
            'contenido'=>'required',
        ]);
        Post::create([
            'titulo'=>$request->titulo,
            'contenido'=>$request->contenido,
            'user_id'=>Auth::id(),
        ]);

        return redirect('/')->with('success','Publicacion creada con exito');
    }
    
    public function index(){
        $posts=[
            ['titulo'=>'primer post','contenido'=>'este es el primer post.'],
            ['titulo'=>'segundo post','contenido'=>'este es el segundo post.'],
            ['titulo'=>'tercer post','contenido'=>'este es el tercer post.'],
        ];
        return view('posts.index',compact('posts'));
    }
}
