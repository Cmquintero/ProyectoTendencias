@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">➕ Crear Estudiante</h2>

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
@endsection
