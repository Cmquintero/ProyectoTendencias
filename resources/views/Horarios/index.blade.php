@extends('layouts.app')

@section('content')
<div class="container">
    <h1>📅 Lista de Horarios</h1>

    <a href="{{ route('horarios.create') }}" class="btn btn-primary mb-3">➕ Nuevo Horario</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>Estudiante</th>
                <th>Semestre</th>
                <th>Docente</th>
                <th>Tipo</th>
                <th>Especialidad</th>
                <th>Asignatura</th>
                <th>Día</th>
                <th>Hora Inicio</th>
                <th>Hora Fin</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($horarios as $h)
                <tr>
                    <td>{{ $h->estudiante->nombre ?? '---' }} {{ $h->estudiante->apellido ?? '' }}</td>
                    <td>{{ $h->estudiante->semestre ?? '---' }}</td>
                    <td>{{ $h->docente->nombre ?? '---' }} {{ $h->docente->apellido ?? '' }}</td>
                    <td>{{ $h->docente->tipo ?? '---' }}</td>
                    <td>{{ $h->docente->especialidad ?? '---' }}</td>
                    <td>{{ $h->asignatura->NombreAsignatura ?? '---' }}</td>
                    <td>{{ $h->Dia }}</td>
                    <td>{{ \Carbon\Carbon::parse($h->HoraInicio)->format('h:i A') }}</td>
<td>{{ \Carbon\Carbon::parse($h->HoraFin)->format('h:i A') }}</td>

                    <td>
                        <a href="{{ route('horarios.edit', $h->ID_Horario) }}" class="btn btn-warning btn-sm mb-1">✏️ Editar</a>
                        <form action="{{ route('horarios.destroy', $h->ID_Horario) }}" method="POST" style="display:inline;" onsubmit="return confirm('⚠️ ¿Seguro que deseas eliminar este horario?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">🗑️ Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="10" class="text-center">⚠️ No hay horarios registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
