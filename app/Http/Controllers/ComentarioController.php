<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;

class ComentarioController extends Controller
{
    //
    public function store(Request $request){
        $request->validate([
            'contenido'=>'required',
            'post_id'=>'required|exists:posts,id'
        ]);

        Comentario::create([
            'contenido'=>$request->contenido,
            'user_id'=>auth()->id(),
            'post_id'=>$request->post_id
        ]);

        return back()->with('success','comentario agregado.');
    }
}
