@extends('layouts.app')
@section('content')
<style>
    body {
        height: 100vh;
        margin: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(-45deg, #fcb045, #FFC0CB, #fcb060, #ff7e5f);
        background-size: 300% 300%;
        animation: gradientShift 10s ease infinite;
        color: #ffffff;
        text-align: center;
        overflow-x: hidden;
    }

    @keyframes gradientShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    /* 🔸 HEADER UNIFICADO */
  header {
    width: 100%; /* ya no 100vw, así no genera scroll lateral */
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    padding: 15px 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
    margin-top:15px;
    overflow-x: hidden;
    border-radius:25px;
}


    .navbar-top {
        display: flex;
        justify-content: space-evenly;
        gap: 30px;
        width: 100%;
        max-width: 1200px;
        padding-right: 30px;
    }

    .navbar-top a {
        color: #fff;
        text-decoration: none;
        font-weight: 600;
        transition: color 0.3s ease;
    }

    .navbar-top a:hover {
        color: #ff9966;
    }

    .navbar-title {
        margin-top: 5px;
        font-size: 1.8rem;
        font-weight: 700;
        text-shadow: 0 0 8px rgba(255, 180, 100, 0.4);
        animation: glowTitle 2s ease-in-out infinite alternate;
    }

    @keyframes glowTitle {
        from { text-shadow: 0 0 8px rgba(255, 150, 80, 0.4); }
        to { text-shadow: 0 0 14px rgba(255, 180, 100, 0.8); }
    }

    /* 🔸 CONTENIDO CENTRAL */
    .welcome-box {
        background: rgba(0, 0, 0, 0.55);
        padding: 60px 80px;
        border-radius: 20px;
        margin-top: 10vh;
        display: inline-block;
        animation: fadeIn 2s ease-in-out;
        box-shadow: 0 0 25px rgba(255, 165, 0, 0.3);
        backdrop-filter: blur(8px);
    }

    h1 {
        color: #ff9966;
        font-size: 3rem;
        margin-bottom: 20px;
        animation: glowText 2s ease-in-out infinite alternate;
    }

    @keyframes glowText {
        from { text-shadow: 0 0 8px rgba(255, 150, 80, 0.4); }
        to { text-shadow: 0 0 12px rgba(255, 170, 100, 0.6); }
    }

    .btn-welcome {
        padding: 15px 50px;
        background: linear-gradient(90deg, #fcb045, #fd1d1d);
        border: none;
        border-radius: 12px;
        color: #0f0c29;
        font-weight: bold;
        font-size: 1.3rem;
        cursor: pointer;
        transition: 0.3s ease;
        box-shadow: 0 0 10px rgba(255, 120, 50, 0.3);
    }

    .btn-welcome:hover {
        transform: scale(1.05);
        box-shadow: 0 0 20px rgba(255,170,100,0.6);
    }

</style>

<header>
    <div class="navbar-top">
        <a href="{{ route('login') }}">🔐 Iniciar sesión</a>
        <a href="{{ route('register') }}">📝 Registrarse</a>
    </div>
    <div class="navbar-title">🏫 Gestión de Horarios</div>
</header>

<div class="welcome-box">
    <h1>Bienvenido al Sistema</h1>
    <p>Administra tus horarios fácilmente desde cualquier lugar 📅</p>
    <a href="{{ route('login') }}">
        <button class="btn-welcome">Iniciar Sesión 🔑</button>
    </a>
</div>

@include('layouts.footer')
@endsection
