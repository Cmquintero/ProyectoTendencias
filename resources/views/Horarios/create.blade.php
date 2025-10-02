@extends('layouts.app')

@section('content')
    <h2 class="mb-3">➕ Crear Horario</h2>

    @if($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif

    <form action="{{ route('horarios.store') }}" method="POST">
        @csrf
      <div class="mb-3">
    <label class="form-label">👨‍🎓 Estudiante</label>
    <select name="ID_Estudiante" class="form-select" required>
        <option value="">Seleccione un Estudiante</option>
        @foreach($estudiantes as $e)
            <option value="{{ $e->id }}">{{ $e->nombre }} {{ $e->apellido }}</option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label class="form-label">👨‍🏫 Docente</label>
    <select name="ID_Docente" class="form-select" required>
        <option value="">Seleccione un Docente</option>
        @foreach($docentes as $d)
            <option value="{{ $d->id }}">{{ $d->nombre }} {{ $d->apellido }}</option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label class="form-label">✍️ Asignatura</label>
    <select name="ID_Asignatura" class="form-select" required>
        <option value="">Seleccione una Asignatura</option>
        @foreach($asignaturas as $a)
            <option value="{{ $a->id }}">{{ $a->NombreAsignatura }}</option>
        @endforeach
    </select>
</div>


        <div class="mb-3">
            <label class="form-label">🎒Día</label>
            <select name="Dia" class="form-select" required>
                <option value="Lunes">Lunes</option>
                <option value="Martes">Martes</option>
                <option value="Miércoles">Miércoles</option>
                <option value="Jueves">Jueves</option>
                <option value="Viernes">Viernes</option>
                <option value="Sábado">Sábado</option>
            </select>
        </div>

        <div class="mb-3">
    <label class="form-label">🕧 Hora Inicio</label>
    <input type="time" name="HoraInicio" class="form-control" value="{{ old('HoraInicio', $horario->HoraInicio ?? '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label">🕧 Hora Fin</label>
    <input type="time" name="HoraFin" class="form-control" value="{{ old('HoraFin', $horario->HoraFin ?? '') }}" required>
</div>


        <button class="btn btn-success">💾 Guardar</button>
        <a href="{{ route('horarios.index') }}" class="btn btn-secondary">⬅️ Volver</a>
    </form>
@endsection
