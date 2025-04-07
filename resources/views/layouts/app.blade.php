<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
	<title>Blog para blade</title>
</head>
<body class="bg-light">
	@include('partials.navbar')
	<div class="container mt-4">
		@yield('contenido')
	</div>
</body>
</html>