<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    //
    public function index(){
        $usuario=Auth::user();
        $publicaciones=$usuario->posts()->latest()->get();
        return view('perfil.index',compact('usuario','publicaciones'));
    }

    public function actuliazar(Request $request){
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|max:255|unique:users,email,'. auth()->id(),
        ]);
        $usuario=auth()->use();
        $usuario->name=$request->name;
        $usuario->email=$request->name;
        $usuario->save();

        return redirect()->round('perfil')->with('success','datos actualizador correctamente');
    }

}
