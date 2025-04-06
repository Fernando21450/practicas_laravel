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

}
