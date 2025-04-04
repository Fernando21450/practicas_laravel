@extends('layouts.app')

@section('titulo','lista de publicaciones')

@section('contenido')
<h1 class="mb-4">Publicaciones recientes</h1>
@foreach($posts as $post)
	<div class="mb-3">
		<div class="card-body">
			<h3>{{$post['titulo']}}</h3>
			<p>{{$post['contenido']}}</p>
		</div>
	</div>
@endforeach
@endsection