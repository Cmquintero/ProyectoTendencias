@extends('layouts.app')

@section('content')
<style>
    body, html {
        height: 100%;
        margin: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #0f0c29, #302b63, #24243e); /* negro-magenta-azul oscuro */
        color: #ffffff;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
    }

    .welcome-box {
        background: rgba(0,0,0,0.6);
        padding: 50px 80px;
        border-radius: 15px;
        box-shadow: 0 0 20px rgba(255,255,255,0.2);
        animation: fadeIn 2s ease-in-out;
    }

    h1 {
        font-size: 3rem;
        margin-bottom: 20px;
        color: #ff00ff; /* Magenta */
        text-shadow: 2px 2px 10px rgba(0,0,0,0.7);
    }

    p {
        font-size: 1.5rem;
        color: #ffffff;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-20px);}
        to { opacity: 1; transform: translateY(0);}
    }

    .enter-btn {
        display: inline-block;
        margin-top: 30px;
        padding: 10px 30px;
        font-size: 1.2rem;
        color: #0f0c29;
        background: #ff00ff;
        border-radius: 8px;
        text-decoration: none;
        transition: 0.3s;
    }

    .enter-btn:hover {
        background: #ff33ff;
        transform: scale(1.05);
    }
</style>

<div class="welcome-box">
    <h1>Bienvenido</h1>
    <p>Sistema de Manejo de Horarios</p>
    <a href="{{ route('horarios.index') }}" class="enter-btn">➡️ Entrar</a>
</div>
@endsection
