@extends('layouts.app')

@section('content')
<div class="container">
    <h1>➕ Crear Docente</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>⚠️ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('docentes.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">👨‍🏫Nombre:</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">👨‍🏫Apellido:</label>
            <input type="text" name="apellido" class="form-control" required>
        </div>


        <div class="mb-3">
            <label class="form-label">📖Especialidad:</label>
            <input type="text" name="especialidad" class="form-control" required>
        </div>
        <div class="mb-3">
    <label class="form-label">📌Tipo de docente</label>
    <select name="tipo" class="form-select" required>
        <option value="Planta">Planta</option>
        <option value="Catedrático">Catedrático</option>
    </select>
</div>


        <button type="submit" class="btn btn-success">✅ Guardar</button>
        <a href="{{ route('docentes.index') }}" class="btn btn-secondary">⬅️ Volver</a>
    </form>
</div>
@endsection
