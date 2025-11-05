<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Horarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    {{-- Header / Navbar --}}
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('welcome') }}">🏫 Gestión de Horarios</a>
        <div>
            <ul class="navbar-nav">
                @auth
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">👨‍🎓 Estudiantes</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">👩‍🏫 Docentes</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">📘 Asignaturas</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">📅 Horarios</a></li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link">🚪 Cerrar sesión</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">🔐 Iniciar sesión</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">📝 Registrarse</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>


    {{-- Contenido dinámico --}}
    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
