@extends('layouts.app')

@section('titulo','lista de publicaciones')

@section('contenido')
<h1 class="mb-4">Publicaciones recientes</h1>
@foreach($posts as $post)
	<div class="card mb-3">
		<div class="card-body">
			<h3>{{ $post->titulo }}</h3>
                <p>{{ $post->contenido }}</p>
			<small>Por: {{$post->user->name ?? 'usuario desconocido'}}</small>
			@auth
				@if($post->user_id ===Auth::id())
					<div class="mt-3">
						<a href="{{route('posts.edit',$post)}}" class="btn btn-sm btn-warning">Editar</a>

						<!-- formulario para eliminar -->
						<form action="{{ route('posts.destroy',$post) }}" method="POST" class="d-inline">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estas seguro de eliminar esta publicacion?');">Eliminar</button>
						</form>
					</div>
				@endif
			@endauth
		</div>
	</div>
@endforeach
@endsection