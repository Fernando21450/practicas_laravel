@extends('layouts.app')

@section('titulo','crear publicacion')
@section('contenido')
	<div class="card">
		<div class="card-header">
			<h4>Crear nueva publicacion</h4>
		</div>
		<div class="card-body">
			@if ($errors->any())
				<div class="alert alert-danger">
					<ul class="mb-0">
						@foreach($errors->all() as $error)
							<li>{{$error}}</li>
						@endforeach
					</ul>
				</div>
			@endif
			<form action="{{route('posts.store')}}" method="POST">
				@csrf
				<div class="mb-3">
					<label for="titulo" class="form-label">Titulo</label>
					<input type="text" name="titulo" class="form-control" value="{{old('titulo')}}" required>
				</div>
	
				<button type="submit" class="btn btn-primary">Publicar </button>
	
			</form>
		</div>
	</div>
@endsection
