@extends('layouts.app')

@section('titulo', 'Dashboard')

@section('contenido')
    <div class="p-4 bg-white shadow rounded">
        <h2>Bienvenido al Dashboard</h2>
        <p>Hola, {{ Auth::user()->name }}. Aquí puedes acceder a tus publicaciones y configuraciones.</p>
    </div>
@endsection
