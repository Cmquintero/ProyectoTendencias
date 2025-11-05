<!DOCTYPE html>
<html>
<head>
    <title>Iniciar sesión</title>
</head>
<body style="background-color:#0a0a23; color:white; text-align:center; padding-top:100px;">
    <h1>Bienvenido</h1>
    <form method="POST" action="{{ route('login.post') }}">
        @csrf
        <input type="email" name="email" placeholder="Correo electrónico" required><br><br>
        <input type="password" name="password" placeholder="Contraseña" required><br><br>
        <button type="submit">Entrar</button>
    </form>
    <br>
    <a href="{{ route('register') }}" style="color:magenta;">Crear cuenta</a> |
    <a href="{{ route('forgot') }}" style="color:magenta;">¿Olvidaste tu contraseña?</a>

</body>
</html>
