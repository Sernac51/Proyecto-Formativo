<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.min.css') }}">
    <title>@yield('titulo')</title>
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
        <div class="container">
            <a class="navbar-brand" href="">Gestión de productos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Productos
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('products.index') }}">listar</a></li>
                            <li><a class="dropdown-item" href="{{ route('products.create') }}">Crear nuevo</a></li>
                        </ul>
                    </li>
                    <!-- @can(['administrador']) -->
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            usuarios
                        </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('usuarios.index') }}">listar</a></li>
                                <li><a class="dropdown-item" href="{{ route('usuarios.create')}}">Crear nuevo</a></li>
                            </ul>
                        </li>   
                    <!-- @endcan -->
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Buscar..." name="buscar" aria-label="buscar">
                    <button class="btn btn-secondary" type="submit">Buscar</button>
                </form>
                <ul class="navbar-nav text-light ms-3">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{Auth::user()->name}}
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href=""
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">Cerrar sesion
                                </a>
                                <form id="logout-form" action="{{route('logout')}}" method="post">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>  
                </ul>
            </div>
        </div>
    </nav>


    <h1 class="text-center mt-4">@yield('titulo')</h1>

    <div class="my-3 container">
        @yield('content')
    </div>


    

    <script src="{{ asset('css/bootstrap/js/bootstrap.bundle.js') }}"></script>
    @yield('scripts')
</body>
</html>