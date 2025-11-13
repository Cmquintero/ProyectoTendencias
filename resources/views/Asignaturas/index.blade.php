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
    <h1 style="pointer-events: none;">✍️Lista de Asignaturas</h1>
    <a href="{{ route('asignaturas.create') }}" class="btn btn-primary mb-3">Nueva Asignatura</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Código</th>
                <th>Créditos</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($asignaturas as $asignatura)
            <tr>
            <td>{{ $asignatura->id }}</td>
            <td>{{ $asignatura->NombreAsignatura }}</td>
            <td>{{ $asignatura->codigo }}</td>
            <td>{{ $asignatura->Creditos }}</td>


                <td>
                    
                    <a href="{{ route('asignaturas.edit', $asignatura->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('asignaturas.destroy', $asignatura->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('☣️¿Seguro que deseas eliminar esta asignatura? esta accion no se puede corregir ')">Eliminar</button>
                    </form>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@include('layouts.footerDos')
@endsection
