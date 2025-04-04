@extends('layouts.app')

@section('titulo', 'Página no encontrada')

@section('contenido')
    <div class="text-center p-5">
        <h1 class="display-4">404</h1>
        <p class="lead">Oops, la página que buscas no existe.</p>
        <a href="{{ url('/') }}" class="btn btn-primary">Volver al inicio</a>
    </div>
@endsection
