@extends('layouts.app')

@section('contenido')

<div class="container">
	<h2>{{ $post->titulo }}</h2>
	<p>{{ $post->contenido }}</p>

	<hr>

	<h4>Comentarios</h4>
	@foreach ($post->comentarios as $comentario)
		<div class="mb-2">
			<strong>{{ $comentario->user->name }}</strong> dijo:
            <p>{{ $comentario->contenido }}</p>
        </div>
    @endforeach

    @auth
    	<form action="{{ route('comentarios.store') }}" method="POST">
    		@csrf
    		<input type="hidden" name="post_id" value="{{ $post->id }}">

    		<div class="mb-3">
    			<label for="contenido">Tu comentario: </label>
    			<textarea name="contenido" class="form-control" required></textarea>
    		</div>

    		<button type="submit" class="btn btn-sm btn-primary">comentar</button>

    	</form>
    @endauth
</div>
@endsection