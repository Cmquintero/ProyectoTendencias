<!DOCTYPE html>
<html>
<head>
    <title>Panel de usuario</title>
</head>
<body style="background-color:#0a0a23; color:white; text-align:center; padding-top:100px;">
    <h1>Bienvenido al sistema de manejo de horarios</h1>
    <p>Has iniciado sesión correctamente 🎉</p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Cerrar sesión</button>
    </form>
</body>
</html>
