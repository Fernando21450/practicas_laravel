@extends('layouts.app')

@section('titulo','Mi perfil')

@section('contenido')
	<h1 class="mb-4">Mi perfil</h1>

	<div class="card mb-4">
		<div class="card-body">
			<h4>Nombre: {{$usuario->name}}</h4>
			<p>Email: {{$usuario->email}}</p>
		</div>
	</div>

	<h2>MIs publicaciones</h2>
	@if ($publicaciones->isEmpty())
		<p>no has creado ninguna publicacion todavia.</p>
	@else
		@foreach ($publicacione as $post)
			<div class="card mb-3">
				<div class="card-body">
					<h5>{{ $post->titulo}}</h5>
					<p>{{ $post->contenido}}</p>
					<small class="text-muted">Publicado el {{$post->created_at->format('d/m/Y')}}</small> 

					<div class="mt-2">
						<a href="{{ route('posts.edit',$post)}}" class="btn btn-sm btn-warning">Editar</a>
						<form action="{{route('posts.destroy',$post)}}" method="POST" class="d-inline">
							@csrf
							@method('DELETE')
							<button class="btn btn-sm btn-danger" onclick="return confirm('¿eliminar publicacion?')">Eliminar</button>
						</form>
					</div>
				</div>
			</div>
		@endforeach
	@endif
@endsection 