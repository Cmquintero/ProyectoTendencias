@extends('layouts.app')

@section('content')
<style>
    /* --- Fondo general animado --- */
    body, html {
        height: 100%;
        margin: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(-45deg, #0f0c29, #302b63, #24243e, #8a2be2);
        background-size: 300% 300%;
        animation: gradientShift 10s ease infinite;
        color: #ffffff;
        text-align: center;
        overflow: hidden;
    }

    @keyframes gradientShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    /* --- Navbar animada --- */
    .navbar-animated {
        background: linear-gradient(270deg, #0f0c29, #302b63, #8a2be2, #ff00ff);
        background-size: 400% 400%;
        animation: navbarGradient 10s ease infinite, fadeDown 1.2s ease;
        box-shadow: 0 0 25px rgba(255, 0, 255, 0.4);
        border-bottom: 2px solid rgba(255, 255, 255, 0.2);
    }

    @keyframes navbarGradient {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    @keyframes fadeDown {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .navbar .container {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .navbar-brand {
        font-size: 1.8rem;
        font-weight: 600;
        letter-spacing: 1px;
        color: #fff !important;
        text-shadow: 0 0 10px #ff00ff, 0 0 20px #ff00ff;
        transition: transform 0.3s ease, text-shadow 0.3s ease;
    }

    .navbar-brand:hover {
        transform: scale(1.1);
        text-shadow: 0 0 20px #ff33ff, 0 0 40px #ff33ff;
    }

    /* --- Caja de login --- */
    .login-box {
        background: rgba(0, 0, 0, 0.65);
        padding: 60px 80px;
        border-radius: 20px;
        box-shadow: 0 0 25px rgba(255, 0, 255, 0.4);
        backdrop-filter: blur(8px);
        display: inline-block;
        margin-top: 8%;
        animation: fadeIn 2s ease-in-out;
    }

    h1 {
        color: #ff00ff;
        font-size: 3rem;
        margin-bottom: 30px;
        animation: glow 2s ease-in-out infinite alternate;
    }

    @keyframes glow {
        from { text-shadow: 0 0 10px #ff00ff, 0 0 20px #ff00ff; }
        to { text-shadow: 0 0 20px #ff33ff, 0 0 40px #ff33ff; }
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    input {
        width: 80%;
        padding: 12px;
        margin: 10px 0;
        border: none;
        border-radius: 10px;
        background: rgba(255, 255, 255, 0.1);
        color: #fff;
        font-size: 1rem;
        text-align: center;
    }

    input:focus {
        outline: none;
        background: rgba(255, 255, 255, 0.2);
    }

    .btn-login {
        margin-top: 15px;
        padding: 12px 40px;
        background: #ff00ff;
        color: #0f0c29;
        border: none;
        border-radius: 10px;
        font-weight: bold;
        font-size: 1.2rem;
        cursor: pointer;
        transition: 0.3s ease;
        box-shadow: 0 0 15px rgba(255, 0, 255, 0.5);
    }

    .btn-login:hover {
        background: #ff33ff;
        transform: scale(1.08);
        box-shadow: 0 0 25px rgba(255, 0, 255, 0.8);
    }

    .links a {
        color: #ff33ff;
        text-decoration: none;
        font-weight: bold;
        margin: 0 10px;
        transition: 0.3s ease;
    }

    .links a:hover {
        text-decoration: underline;
        color: #ff66ff;
    }
</style>

{{-- Navbar superior --}}
<nav class="navbar navbar-expand-lg navbar-dark navbar-animated">
    <div class="container justify-content-center">
        <a class="navbar-brand" href="#">🏫 Gestión de Horarios</a>
    </div>
</nav>

{{-- Formulario de login --}}
<div class="login-box">
    <h1>Iniciar Sesión</h1>
    <form method="POST" action="{{ route('login.post') }}">
        @csrf
        <input type="email" name="email" placeholder="Correo electrónico" required><br>
        <input type="password" name="password" placeholder="Contraseña" required><br>
        <button type="submit" class="btn-login">Entrar 🔓</button>
    </form>

    <div class="links">
        <br>
        <a href="{{ route('register') }}">📝 Crear cuenta</a> |
        <a href="{{ route('forgot') }}">❓¿Olvidaste tu contraseña?</a>
    </div>
</div>

@include('layouts.footer')
@endsection
