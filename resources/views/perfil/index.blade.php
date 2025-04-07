@extends('layouts.app')

@section('titulo','Mi perfil')

@section('contenido')
@if(session('success'))
	<div class="alert alert-success">
		{{session('success')}}
	</div>
@endif

	<h1 class="mb-4">Mi perfil</h1>

	<div class="card mb-4">
		<div class="card-body">
			<form action="{{ route('perfil.actualizar') }}" method="POST">
				@csrf
				@method('PUT')
				<div class="mb-3">
					<label for="name" class="form-label">Nombre:</label>
					<input type="text" name="name" id="name" class="form-control" value="{{ $usuario->name }}" required>
				</div>

				<div class="mb-3">
					<label for="email" class="form-label">Correo electronico:</label>
					<input type="email" name="email" class="form-control" value="{{ $usuario->email }}" required>
				</div>

				<button type="submit" class="btn btn-primary">Actualizar datos</button>
			</form>
		</div>
	</div>

	<h2>MIs publicaciones</h2>
	@if ($publicaciones->isEmpty())
		<p>no has creado ninguna publicacion todavia.</p>
	@else
		@foreach ($publicaciones as $post)
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