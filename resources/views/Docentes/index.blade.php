
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>👩‍🏫 Lista de Docentes</h1>
    <a href="{{ route('docentes.create') }}" class="btn btn-primary mb-3">➕ Nuevo Docente</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>tipo</th>
                <th>Especialidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($docentes as $d)
                <tr>
                    <td>{{ $d->id }}</td>
                    <td>{{ $d->nombre }}</td>
                    <td>{{ $d->apellido }}</td>
                    <td>{{ $d->tipo }}</td>
                    <td>{{ $d->especialidad }}</td>
                    <td>
                        <a href="{{ route('docentes.edit', $d->id) }}" class="btn btn-warning btn-sm">✏️ Editar</a>
                        <form action="{{ route('docentes.destroy', $d->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('☣️¿Seguro que deseas eliminar El docente esta accion no se puede corregir?')">🗑️ Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">⚠️ No hay docentes registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
