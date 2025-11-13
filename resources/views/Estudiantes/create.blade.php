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
    <h2 class="mb-4"  style="pointer-events: none;">➕ Crear Estudiante</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>⚠️ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('estudiantes.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="mb-3">
                <label class="form-label">👨‍🎓Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">✍️Apellido</label>
                <input type="text" name="apellido" class="form-control" value="{{ old('apellido') }}" required>
            </div>
        </div>

        <div class="row">
            <div class="mb-3">
                <label class="form-label">📕Semestre</label>
                <input type="number" name="semestre" class="form-control" value="{{ old('Semestre') }}"required>
            </div>

        </div>
        

        <div class="mb-3">
            <button class="btn btn-success">💾 Guardar Estudiante</button>
            <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary">⬅️ Volver</a>
        </div>
    </form>
</div>
@include('layouts.footerDos')
@endsection
