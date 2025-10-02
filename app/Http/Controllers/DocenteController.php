<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    public function index()
    {
        $docentes = Docente::all();
        return view('docentes.index', compact('docentes'));
    }

    public function create()
    {
        return view('docentes.create');
    }

    public function store(Request $request)
    {
       $request->validate([
    'nombre' => 'required|string|max:50',
    'apellido' => 'required|string|max:50',
    'especialidad' => 'required|string|max:100',
    'tipo' => 'required|string|in:Planta,Catedrático',
]);



        Docente::create($request->all());

        return redirect()->route('docentes.index')->with('success', 'Docente creado correctamente');
    }

    public function show($id)
    {
        $docente = Docente::findOrFail($id);
        return view('docentes.show', compact('docente'));
    }

    public function edit($id)
    {
        $docente = Docente::findOrFail($id);
        return view('docentes.edit', compact('docente'));
    }

    public function update(Request $request, $id)
    {
        $docente = Docente::findOrFail($id);

        $request->validate([
              'nombre' => 'required|string|max:50',
    'apellido' => 'required|string|max:50',
    'especialidad' => 'required|string|max:100',
    'tipo' => 'required|string|in:Planta,Catedrático',
        ]);

        $docente->update($request->all());

        return redirect()->route('docentes.index')->with('success', 'Docente actualizado correctamente');
    }

    public function destroy($id)
    {
        $docente = Docente::findOrFail($id);
        $docente->delete();

        return redirect()->route('docentes.index')->with('success', 'Docente eliminado correctamente');
    }
}
