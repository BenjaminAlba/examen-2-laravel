<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventario</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Forntawesome -->
    <script src="https://kit.fontawesome.com/1603b167ac.js" crossorigin="anonymous"></script>
</head>

<body class="background-base">
    <nav class="navbar navbar-expand-lg main-color shadow">
        <div class="container">
            @auth
                @if(auth()->user()->role == 'administrador')
                    <a class="navbar-brand font-primary fw-bold" href="{{ route('admin-dashboard') }}"> 
                        <span> 
                            <i class="fa-solid fa-stapler"></i> 
                        </span> 
                        Papelería
                    </a>
                @elseif(auth()->user()->role == 'usuario')
                    <a class="navbar-brand font-primary fw-bold" href="{{ route('user-dashboard') }}"> 
                        <span> 
                            <i class="fa-solid fa-stapler"></i> 
                        </span> 
                        Papelería
                    </a>
                @endif
            @endauth
            @guest
                <a class="navbar-brand font-primary fw-bold" href=""> 
                    <span> 
                        <i class="fa-solid fa-stapler"></i> 
                    </span> 
                    Papelería
                </a>
            @endguest
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto"> 
                    @guest
                        <li class="nav-item">
                            <a class="nav-link font-primary fw-bold" href="{{ route('login') }}">Login</a>
                        </li>
                    @else
                        @auth
                            @if(auth()->user()->role == 'administrador')
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('admin-inventory') }}">Inventario</a>
                                </li>
                            @elseif(auth()->user()->role == 'usuario')
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('user-personalInventory') }}">Inventario</a>
                                </li>
                            @endif
                        @endauth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle font-primary fw-bold" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu main-color">
                                @auth
                                    @if(auth()->user()->role == 'usuario')
                                        <li>
                                            <a href="{{ route('user-credentials') }}" class="fw-bold dropdown-item font-primary">Cambiar Contraseña</a>
                                        </li>
                                    @endif
                                @endauth
                                <li>
                                    <a class="fw-bold dropdown-item font-primary" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        Cerrar Sesión
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        @method("POST")
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class="container ">
        @yield('content')
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

<style>

.main-color{
    background-color: #B3DCFA;
}

.font-primary
{
    color: #42484D;
}

.background-base{
    background-color: #BBC8D1;
}

.background-lighter{
    background-color: #DBE1E6;
}

.background-cardtitle{
    background-color: #FFFFFF;
}

</style>

</html>

