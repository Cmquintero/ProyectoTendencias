<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    public function index()
    {
        $estudiantes = Estudiante::all();
        return view('estudiantes.index', compact('estudiantes'));
    }

    public function create()
    {
        return view('estudiantes.create');
    }

  public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'apellido' => 'required|string|max:255',
        'semestre' => 'required|integer|min:1',
    ]);

    // Generar email automático
    $codigo = rand(1000, 9999); // o cualquier lógica para un código único
    $email = strtolower(str_replace(' ', '', $request->nombre . $request->apellido) . $codigo . '@ufpso.edu.co');

    Estudiante::create([
        'nombre' => $request->nombre,
        'apellido' => $request->apellido,
        'semestre' => $request->semestre,
        'email' => $email
    ]);

    return redirect()->route('estudiantes.index')->with('success', 'Estudiante creado correctamente con email: ' . $email);
}


    public function edit($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        return view('estudiantes.edit', compact('estudiante'));
    }

    public function update(Request $request, $id)
    {
        $estudiante = Estudiante::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:50',
            'apellido' => 'required|string|max:50',
            'semestre' => 'required|integer|min:1|max:10',
        ]);

        $estudiante->update([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'semestre' => $request->semestre,
            // El email no se cambia aquí
        ]);

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante actualizado correctamente');
    }

    public function destroy($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $estudiante->delete();

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante eliminado correctamente');
    }
}
