<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use App\Models\Estudiante;
use App\Models\Docente;
use App\Models\Asignatura;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
   public function index()
{
    $horarios = Horario::with(['estudiante', 'docente', 'asignatura'])->get();
    $estudiantes = Estudiante::all();
    $docentes = Docente::all();
    $asignaturas = Asignatura::all();

    return view('horarios.index', compact('horarios','estudiantes','docentes','asignaturas'));
}


    public function create()
    {
        return view('horarios.create', [
            'estudiantes' => Estudiante::all(),
            'docentes' => Docente::all(),
            'asignaturas' => Asignatura::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'ID_Estudiante' => 'required|exists:estudiantes,id',
            'ID_Docente' => 'required|exists:docentes,id',
            'ID_Asignatura' => 'required|exists:asignaturas,id',
            'Dia' => 'required|string',
            'HoraInicio' => 'required',
            'HoraFin' => 'required',
        ]);

        // Verificar choques de horarios
        $choque = Horario::where(function($q) use ($request){
                        $q->where('ID_Estudiante', $request->ID_Estudiante)
                          ->orWhere('ID_Docente', $request->ID_Docente);
                    })
                    ->where('Dia', $request->Dia)
                    ->where(function($q) use ($request){
                        $q->whereBetween('HoraInicio', [$request->HoraInicio, $request->HoraFin])
                          ->orWhereBetween('HoraFin', [$request->HoraInicio, $request->HoraFin]);
                    })->exists();

        if($choque){
            return back()->withErrors(['error' => '⚠️ Choque de horario detectado.']);
        }

        Horario::create($request->only(['ID_Estudiante','ID_Docente','ID_Asignatura','Dia','HoraInicio','HoraFin']));

        return redirect()->route('horarios.index')->with('success','Horario creado correctamente.');
    }

    public function edit($id)
    {
        return view('horarios.edit', [
            'horario' => Horario::findOrFail($id),
            'estudiantes' => Estudiante::all(),
            'docentes' => Docente::all(),
            'asignaturas' => Asignatura::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ID_Estudiante' => 'required|exists:estudiantes,id',
            'ID_Docente' => 'required|exists:docentes,id',
            'ID_Asignatura' => 'required|exists:asignaturas,id',
            'Dia' => 'required|string',
            'HoraInicio' => 'required|date_format:H:i',
    'HoraFin' => 'required|date_format:H:i|after:HoraInicio',
        ]);

        $choque = Horario::where(function($q) use ($request, $id){
                        $q->where('ID_Estudiante', $request->ID_Estudiante)
                          ->orWhere('ID_Docente', $request->ID_Docente);
                    })
                    ->where('Dia', $request->Dia)
                    ->where(function($q) use ($request){
                        $q->whereBetween('HoraInicio', [$request->HoraInicio, $request->HoraFin])
                          ->orWhereBetween('HoraFin', [$request->HoraInicio, $request->HoraFin]);
                    })
                    ->where('ID_Horario','!=',$id)
                    ->exists();

        if($choque){
            return back()->withErrors(['error' => '⚠️ Choque de horario detectado.']);
        }

        Horario::findOrFail($id)->update($request->only(['ID_Estudiante','ID_Docente','ID_Asignatura','Dia','HoraInicio','HoraFin']));

        return redirect()->route('horarios.index')->with('success','Horario actualizado correctamente.');
    }

    public function destroy($id)
    {
        Horario::findOrFail($id)->delete();
        return redirect()->route('horarios.index')->with('success','Horario eliminado correctamente.');
    }

    // Consultar por estudiante
    public function porEstudiante($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $horarios = Horario::with(['docente','asignatura'])->where('ID_Estudiante',$id)->get();
        return view('horarios.porEstudiante', compact('estudiante','horarios'));
    }

    // Consultar por docente
    public function porDocente($id)
    {
        $docente = Docente::findOrFail($id);
        $horarios = Horario::with(['estudiante','asignatura'])->where('ID_Docente',$id)->get();
        return view('horarios.porDocente', compact('docente','horarios'));
    }
}
