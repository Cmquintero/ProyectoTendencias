@extends('layouts.app')

@section('content')
<style>
    body, html {
        height: 100%;
        margin: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
        color: #ffffff;
        text-align: center;
        overflow: hidden;
    }

    @keyframes gradientShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    body {
        background: linear-gradient(-45deg, #0f0c29, #302b63, #24243e, #8a2be2);
        background-size: 300% 300%;
        animation: gradientShift 10s ease infinite;
    }

    .welcome-box {
        background: rgba(0, 0, 0, 0.65);
        padding: 60px 90px;
        border-radius: 20px;
        box-shadow: 0 0 25px rgba(255, 0, 255, 0.4);
        animation: fadeIn 2s ease-in-out;
        backdrop-filter: blur(8px);
        display: inline-block;
        margin-top: 8%;
    }

    h1 {
        font-size: 3.5rem;
        margin-bottom: 15px;
        color: #ff00ff;
        text-shadow: 2px 2px 15px rgba(0, 0, 0, 0.7);
        animation: glow 2s ease-in-out infinite alternate;
    }

    h2 {
        font-size: 1.8rem;
        color: #ffffff;
        margin-bottom: 40px;
        letter-spacing: 1px;
        opacity: 0.9;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes glow {
        from { text-shadow: 0 0 10px #ff00ff, 0 0 20px #ff00ff; }
        to { text-shadow: 0 0 20px #ff33ff, 0 0 40px #ff33ff; }
    }

    .enter-btn {
        display: inline-block;
        margin-top: 10px;
        padding: 12px 35px;
        font-size: 1.3rem;
        color: #0f0c29;
        background: #ff00ff;
        border-radius: 10px;
        text-decoration: none;
        font-weight: bold;
        transition: 0.3s ease;
        box-shadow: 0 0 15px rgba(255, 0, 255, 0.5);
    }

    .enter-btn:hover {
        background: #ff33ff;
        transform: scale(1.08);
        box-shadow: 0 0 25px rgba(255, 0, 255, 0.8);
    }

    .footer-text {
        margin-top: 30px;
        font-size: 1rem;
        color: #cccccc;
        opacity: 0.8;
    }
</style>

{{-- Navbar superior --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">🏫 Gestión de Horarios</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">🔐 Iniciar sesión</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">📝 Registrarse</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

{{-- Contenido principal --}}
<div class="welcome-box">
    <h1>¡Bienvenido!</h1>
    <h2>Sistema de Manejo de Horarios</h2>
    <p class="footer-text">Aquí puedes gestionar, consultar y organizar tus horarios fácilmente.</p>
    <a href="{{ route('login') }}" class="enter-btn">🔐 Iniciar sesión</a>
</div>
@include('layouts.footer')
@endsection
