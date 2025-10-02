@extends('layouts.app')

@section('content')
<div class="container">
    <h1>✏️ Editar Asignatura</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>⚠️ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('asignaturas.update', $asignatura->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="NombreAsignatura">📝 Nombre</label>
            <input type="text" name="NombreAsignatura" class="form-control" value="{{ old('NombreAsignatura', $asignatura->NombreAsignatura) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="Creditos">✍️ Créditos</label>
            <input type="number" name="Creditos" class="form-control" min="1" max="10" value="{{ old('Creditos', $asignatura->Creditos) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="codigo">📓 Código</label>
            <input type="text" name="codigo" class="form-control" value="{{ old('codigo', $asignatura->codigo) }}">
        </div>

        <button type="submit" class="btn btn-success">💾 Actualizar</button>
        <a href="{{ route('asignaturas.index') }}" class="btn btn-secondary">🔙 Volver</a>
    </form>
</div>
@endsection
