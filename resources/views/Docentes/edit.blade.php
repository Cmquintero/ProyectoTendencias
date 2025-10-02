@extends('layouts.app')

@section('content')
<div class="container">
    <h1>✏️ Editar Docente</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>⚠️ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('docentes.update', $docente->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">👨‍🏫 Nombre:</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $docente->nombre) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">👨‍🏫 Apellido:</label>
            <input type="text" name="apellido" class="form-control" value="{{ old('apellido', $docente->apellido) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">📖 Especialidad:</label>
            <input type="text" name="especialidad" class="form-control" value="{{ old('especialidad', $docente->especialidad) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">📌 Tipo de docente:</label>
            <select name="tipo" class="form-select" required>
                <option value="Planta" {{ old('tipo', $docente->tipo) == 'Planta' ? 'selected' : '' }}>Planta</option>
                <option value="Catedrático" {{ old('tipo', $docente->tipo) == 'Catedrático' ? 'selected' : '' }}>Catedrático</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">💾 Actualizar</button>
        <a href="{{ route('docentes.index') }}" class="btn btn-secondary">🔙 Volver</a>
    </form>
</div>
@endsection
