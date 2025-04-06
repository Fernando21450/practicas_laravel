@extends('layouts.app')

@section('titulo','Editar publicacion')

@section('contenido')

	<div class="card">
		<div class="card-header">
			<h4>Editar Publicacion</h4>
		</div>
		<div class="card-body">
			@if($errors->any())
				<div class="alert alert-danger">
					<ul class="mb-0">
						@foreach ($errors->all() as $error)
							<li>{{$error}}</li>
						@endforeach
					</ul>
				</div>
			@endif

			<form action="{{route('post.update',$post)}}" method="POST">
				@csrf
				@method('PUT')
				<div class="mb-3">
					<label for="titulo" class="form-label">Titulo</label>
					<input type="text" name="titulo" class="form-control" value="{{old('titulo',$post->titulo)}}" required>
				</div>

				<div class="mb-3">
					<label for="contenido" class="form-label">Contenido</label>
					<textarea name="contenido" class="form-control" rows="5" required>{{old('contenido',$post->contenido)}}</textarea>
				</div>

				<button type="submit" class="btn btn-primary">Actualizar publicacion</button>
			</form>
		</div>
	</div>
@endsection