<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use Illuminate\Http\Request;

class AsignaturaController extends Controller
{
    public function index()
    {
        $asignaturas = Asignatura::all();
        return view('asignaturas.index', compact('asignaturas'));
    }

    public function create()
    {
        return view('asignaturas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
           'NombreAsignatura' => 'required|string|max:100',
            'Creditos' => 'required|integer|min:1|max:10',

        ]);

        Asignatura::create($request->all());

        return redirect()->route('asignaturas.index')->with('success', 'Asignatura creada correctamente');
    }

    public function show($id)
    {
        $asignatura = Asignatura::findOrFail($id);
        return view('asignaturas.show', compact('asignatura'));
    }

    public function edit($id)
    {
        $asignatura = Asignatura::findOrFail($id);
        return view('asignaturas.edit', compact('asignatura'));
    }

    public function update(Request $request, $id)
    {
        $asignatura = Asignatura::findOrFail($id);

        $request->validate([
            'NombreAsignatura' => 'required|string|max:100',
            'Creditos' => 'required|integer|min:1|max:10',
        ]);

        $asignatura->update($request->all());

        return redirect()->route('asignaturas.index')->with('success', 'Asignatura actualizada correctamente');
    }

    public function destroy($id)
    {
        $asignatura = Asignatura::findOrFail($id);
        $asignatura->delete();

        return redirect()->route('asignaturas.index')->with('success', 'Asignatura eliminada correctamente');
    }
}
