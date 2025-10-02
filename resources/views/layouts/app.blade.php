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
            <a class="navbar-brand" href="{{ route('horarios.index') }}">🏫 Gestión de Horarios</a>
            <div>
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('estudiantes.index') }}">👨‍🎓 Estudiantes</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('docentes.index') }}">👩‍🏫 Docentes</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('asignaturas.index') }}">📘 Asignaturas</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('horarios.index') }}">📅 Horarios</a></li>
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
