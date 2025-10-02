@extends('layouts.app')

@section('content')
<div class="container">
    <h1>👨‍🎓 Lista de Estudiantes</h1>

    <a href="{{ route('estudiantes.create') }}" class="btn btn-primary mb-3">➕ Nuevo Estudiante</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Semestre</th> <!-- Nueva columna -->
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($estudiantes as $estudiante)
                <tr>
                    <td>{{ $estudiante->id }}</td>
                    <td>{{ $estudiante->nombre }}</td>
                    <td>{{ $estudiante->apellido }}</td>
                    <td>{{ $estudiante->email }}</td>
                    <td>{{ $estudiante->semestre }}</td> <!-- Mostrar semestre -->
                    <td>
                        <a href="{{ route('estudiantes.edit', $estudiante->id) }}" class="btn btn-warning btn-sm">✏️ Editar</a>
                        <form action="{{ route('estudiantes.destroy', $estudiante->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('☣️ ¿Seguro que deseas eliminar el Estudiante? Esta acción no se puede deshacer.')">🗑️ Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No hay estudiantes registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
