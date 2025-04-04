@extends('layouts.app')

@section('titulo', 'Mi Perfil')

@section('contenido')
    <div class="card">
        <div class="card-header">
            <h3>Información de perfil</h3>
        </div>
        <div class="card-body">
            <p><strong>Nombre:</strong> {{ Auth::user()->name }}</p>
            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
            <p><strong>Registrado en:</strong> {{ Auth::user()->created_at->format('d/m/Y') }}</p>
        </div>
    </div>
@endsection
