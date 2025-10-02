@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nueva Asignatura</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('asignaturas.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="NombreAsignatura">📝Nombre</label>
            <input type="text" name="NombreAsignatura" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="Creditos">✍️Créditos</label>
            <input type="number" name="Creditos" class="form-control" min="1" max="10" required>
        </div>

        <div class="form-group mb-3">
        <label for="codigo">📓Código</label>
        <input type="text" name="codigo" class="form-control">
        </div>


        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('asignaturas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
