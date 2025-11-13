@extends('layouts.app')
@include('layouts.header')
@section('content')
<style>
 
html, body {
    height: 100%;
    display: flex;
    flex-direction: column;
}

/* Este es tu body original */
body {
    background: linear-gradient(-45deg, #fcb045, #FFC0CB, #fcb060, #ff7e5f);
    background-size: 300% 300%;
    animation: gradientShift 10s ease infinite;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #fff;
    overflow-x: hidden;
}


    @keyframes gradientShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    /* 🔸 Contenedor principal */
   
    h1 {
        text-align: center;
        font-size: 2.5rem;
        color: #ff9966;
        margin-bottom: 30px;
        text-shadow: 0 0 12px rgba(255, 170, 100, 0.6);
        animation: glow 2s ease-in-out infinite alternate;
    }

    @keyframes glow {
        from { text-shadow: 0 0 8px rgba(255, 150, 80, 0.4); }
        to { text-shadow: 0 0 14px rgba(255, 180, 100, 0.8); }
    }

    /* 🔸 Tabla */
    table {
        width: 100%;
        border-collapse: collapse;
        border-radius: 15px;
        overflow: hidden;
        color: #fff;
    }

    thead {
        background: linear-gradient(90deg, #fcb045, #fd1d1d);
        color: #fff;
    }

    th, td {
        text-align: center;
        padding: 12px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.15);
    }

    tbody tr:hover {
        background: rgba(255, 255, 255, 0.08);
        transition: 0.3s ease;
    }

    /* 🔸 Botones */
    .btn-primary {
        background: linear-gradient(90deg, #fcb045, #fd1d1d);
        border: none;
        border-radius: 12px;
        font-weight: bold;
        transition: transform 0.2s ease;
    }

    .btn-primary:hover {
        transform: scale(1.05);
        box-shadow: 0 0 15px rgba(255, 180, 100, 0.6);
    }

    .btn-warning {
        background: linear-gradient(90deg, #fcb045, #ff9966);
        border: none;
        color: #000;
        font-weight: 600;
        border-radius: 8px;
    }

    .btn-danger {
        background: linear-gradient(90deg, #fd1d1d, #fcb045);
        border: none;
        font-weight: 600;
        border-radius: 8px;
    }

    .alert-success {
        background: rgba(255, 255, 255, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.4);
        color: #fff;
        border-radius: 10px;
        text-align: center;
        margin-bottom: 25px;
    }

</style>
<div class="container">
    <h1 style="pointer-events: none;">✏️ Editar Estudiante</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>⚠️ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('estudiantes.update', $estudiante->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $estudiante->nombre) }}" required>
        </div>

        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido:</label>
            <input type="text" name="apellido" id="apellido" class="form-control" value="{{ old('apellido', $estudiante->apellido) }}" required>
        </div>

        <div class="mb-3">
            <label for="semestre" class="form-label">Semestre:</label>
            <input type="number" name="semestre" id="semestre" class="form-control" value="{{ old('semestre', $estudiante->semestre) }}" min="1" max="10" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email (automático):</label>
            <input type="email" id="email" class="form-control" value="{{ $estudiante->email }}" disabled>
        </div>

        <button type="submit" class="btn btn-success">💾 Actualizar</button>
        <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary">🔙 Volver</a>
    </form>
</div>
@include('layouts.footerDos')
@endsection
