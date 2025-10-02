@extends('layouts.app')

@section('content')
<div class="container">
    <h1>✍️Lista de Asignaturas</h1>
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
@endsection
