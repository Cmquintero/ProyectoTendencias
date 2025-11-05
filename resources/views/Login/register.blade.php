<!DOCTYPE html>
<html>
<head>
    <title>Registrarse</title>
</head>
<body style="background-color:#0a0a23; color:white; text-align:center; padding-top:100px;">
    <h1>Registro</h1>
    <form method="POST" action="{{ route('register.post') }}">
        @csrf
        <input type="text" name="name" placeholder="Nombre completo" required><br><br>
        <input type="email" name="email" placeholder="Correo electrónico" required><br><br>
        <input type="password" name="password" placeholder="Contraseña" required><br><br>
        <input type="password" name="password_confirmation" placeholder="Confirmar contraseña" required><br><br>
        <button type="submit">Crear cuenta</button>
    </form>
    <br>
    <a href="{{ route('login') }}" style="color:magenta;">Volver al login</a>
</body>
</html>
