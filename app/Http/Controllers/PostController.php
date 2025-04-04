<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(){
        $posts=[
            ['titulo'=>'primer post','contenido'=>'este es el primer post.'],
            ['titulo'=>'segundo post','contenido'=>'este es el segundo post.'],
            ['titulo'=>'tercer post','contenido'=>'este es el tercer post.'],
        ];
        return view('posts.index',compact('posts'));
    }
}
