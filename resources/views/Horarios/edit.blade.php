@extends('layouts.app')

@section('content')
    <h2 class="mb-3">✏️ Editar Horario</h2>

    @if($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif

    <form action="{{ route('horarios.update', $horario->ID_Horario) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">👨‍🎓 Estudiante</label>
            <select name="ID_Estudiante" class="form-select" required>
                <option value="">Seleccione un Estudiante</option>
                @foreach($estudiantes as $e)
                    <option value="{{ $e->id }}" {{ $horario->ID_Estudiante == $e->id ? 'selected' : '' }}>
                        {{ $e->nombre }} {{ $e->apellido }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">👨‍🏫 Docente</label>
            <select name="ID_Docente" class="form-select" required>
                <option value="">Seleccione un Docente</option>
                @foreach($docentes as $d)
                    <option value="{{ $d->id }}" {{ $horario->ID_Docente == $d->id ? 'selected' : '' }}>
                        {{ $d->nombre }} {{ $d->apellido }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">✍️ Asignatura</label>
            <select name="ID_Asignatura" class="form-select" required>
                <option value="">Seleccione una Asignatura</option>
                @foreach($asignaturas as $a)
                    <option value="{{ $a->id }}" {{ $horario->ID_Asignatura == $a->id ? 'selected' : '' }}>
                        {{ $a->NombreAsignatura }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">🎒 Día</label>
            <select name="Dia" class="form-select" required>
                @foreach(['Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'] as $dia)
                    <option value="{{ $dia }}" {{ $horario->Dia == $dia ? 'selected' : '' }}>{{ $dia }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">🕧 Hora Inicio</label>
            <input type="time" name="HoraInicio" class="form-control" 
                   value="{{ old('HoraInicio', $horario->HoraInicio) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">🕧 Hora Fin</label>
            <input type="time" name="HoraFin" class="form-control" 
                   value="{{ old('HoraFin', $horario->HoraFin) }}" required>
        </div>

        <button class="btn btn-success">💾 Actualizar</button>
        <a href="{{ route('horarios.index') }}" class="btn btn-secondary">⬅️ Volver</a>
    </form>
@endsection
