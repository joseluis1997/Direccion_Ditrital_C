<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profesor; // Usa tu propio modelo, no de Spatie

class ProfesoresController extends Controller
{
    public function index()
    {
        $profesores = Profesor::all(); // Cambia la variable a plural para mayor claridad
        return view('profesores.index', compact('profesores'));
    }
    public function create()
    {
        return view('profesores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ci' => 'required',
            'rda' => 'required',
            'nommbre' => 'required',
            'apellidos' => 'required',
            'celular' => 'required',
            'correo' => 'required|email',
        ]);

        Profesor::create($request->all());
        return redirect()->route('profesores.index')->with('success', 'Profesor registrado.');
    }
    public function edit(Profesor $profesore)
    {
        return view('profesores.edit', compact('profesore'));
    }

    public function update(Request $request, Profesor $profesore)
    {
        // Validar los datos del formulario
        $request->validate([
            'ci' => 'required|string|max:255', // Asegúrate de que este campo sea correcto
            'rda' => 'required|string|max:255',
            'nommbre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'celular' => 'required|string|max:255',
            'correo' => 'required|email|unique:profesores,correo,' . $profesore->id, // Excluye el correo actual de la verificación única
        ]);

        // Actualizar el profesor con los datos del formulario
        $profesore->update($request->all());

        // Redirigir con un mensaje de éxito
        return redirect()->route('profesores.index')->with('success', 'Profesor actualizado correctamente.');
    }
    public function destroy(Profesor $profesore)
    {
        $profesore->delete();
        return redirect()->route('profesores.index')->with('success', 'Usuario eliminado con éxito.');
    }

}
