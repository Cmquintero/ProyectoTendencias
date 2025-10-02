@extends('layouts.app')

@section('content')
<div class="container">
    <h1>✏️ Editar Estudiante</h1>

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
@endsection
