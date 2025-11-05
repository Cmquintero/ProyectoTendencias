<!DOCTYPE html>
<html>
<head>
    <title>Recuperar contraseña</title>
</head>
<body style="background-color:#0a0a23; color:white; text-align:center; padding-top:100px;">
    <h1>Recuperar contraseña</h1>
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <input type="email" name="email" placeholder="Correo registrado" required><br><br>
        <button type="submit">Enviar enlace de recuperación</button>
    </form>
    <br>
    <a href="{{ route('login') }}" style="color:magenta;">Volver al login</a>
</body>
</html>
