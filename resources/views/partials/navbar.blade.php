<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">MiniBlog</a>
        <div class="d-flex">
            <a href="{{ route('contacto') }}" class="nav-link text-white me-3">Contacto</a>
            <a class="nav-link text-white me-3" href="{{ route('perfil')}}">Mi perfil</a>
            @guest
                <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Login</a>
                <a href="{{ route('register') }}" class="btn btn-light">Registrarse</a>
            @endguest

            @auth
                <a href="{{ route('dashboard') }}" class="btn btn-outline-light me-2">Dashboard</a>
                <a href="{{ route('perfil') }}" class="btn btn-outline-light me-2">Perfil</a>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button class="btn btn-danger">Logout</button>
                </form>
            @endauth
        </div>
    </div>
</nav>
