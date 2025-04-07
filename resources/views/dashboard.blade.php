@extends('layouts.app')

@section('titulo', 'Dashboard')

@section('contenido')
    <div class="p-4 bg-white shadow rounded">
        <h2>Bienvenido al Dashboard</h2>
        <p>Hola, {{ Auth::user()->name }}. Aquí puedes acceder a tus publicaciones y configuraciones.</p>
        @auth
            <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">
                Crear nueva publicación
            </a>
        @endauth
    </div>
@endsection
