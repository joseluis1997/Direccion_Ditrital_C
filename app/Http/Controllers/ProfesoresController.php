<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profesor;
use App\Models\UnidadesE; // Usa tu propio modelo, no de Spatie

class ProfesoresController extends Controller
{
    public function index()
    {
        $profesores = Profesor::all(); // Cambia la variable a plural para mayor claridad
        return view('profesores.index', compact('profesores'));
    }
    public function create()
    {
        $unidadesEducativas = UnidadesE::all(); // Obtiene todas las unidades educativas
        return view('profesores.create', compact('unidadesEducativas'));
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'ci' => 'required',
            'rda' => 'required',
            'nombre' => 'required',
            'apellidos' => 'required',
            'celular' => 'required',
            'correo' => 'required|email',
            'pdf' => 'required|file|mimes:pdf|max:2048', // 2MB max
            'unidad_educativa_id' => 'required|exists:unidades_ed,id' // Validación para el ID de unidad educativa
        ]);
    
        // Inicializa un nuevo objeto Profesor
        $profesor = new Profesor();
    
        // Maneja el archivo PDF
        if ($request->hasFile('pdf')) {
            $path = $request->file('pdf')->store('pdfs', 'public');
            $profesor->pdf_path = $path; // Asigna el pdf_path al objeto
        }
    
        // Asigna otros campos al objeto Profesor
        $profesor->ci = $request->input('ci');
        $profesor->rda = $request->input('rda');
        $profesor->nombre = $request->input('nombre');
        $profesor->apellidos = $request->input('apellidos');
        $profesor->celular = $request->input('celular');
        $profesor->correo = $request->input('correo');
        $profesor->unidad_educativa_id = $request->input('unidad_educativa_id'); // Asigna la unidad educativa
    
        // Guarda el objeto en la base de datos
        $profesor->save();
    
        // Redirigir a la lista de profesores con un mensaje de éxito
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

    public function show($id){
        $profesor = Profesor::with('unidadEducativa')->findOrFail($id);
        return view('profesores.show', compact('profesor'));
    }
    public function destroy(Profesor $profesore)
    {
        $profesore->delete();
        return redirect()->route('profesores.index')->with('success', 'Usuario eliminado con éxito.');
    }
    public function mostrarPdf($id)
    {
        $profesor = Profesor::findOrFail($id);
        $path = storage_path('app/public/' . $profesor->pdf_path);

        return response()->file($path, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . basename($path) . '"'
        ]);
    }

}
