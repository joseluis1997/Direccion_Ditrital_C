<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\UnidadesE;
use Illuminate\Support\Facades\DB;

class EstudiantesController extends Controller
{
    public function index()
    {
        $estudiantes = Estudiante::with('unidadEducativa')->get();
        return view('estudiantes.index', compact('estudiantes'));
    }

    public function create()
    {
        $unidadesEducativas=UnidadesE::all();
        return view('estudiantes.create', compact('unidadesEducativas'));
    }
    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $validated = $request->validate([
            'unidad_educativa_id' => 'required|exists:unidades_ed,id',
            'cantidad_hombres_inicial' => 'nullable|array',
            'cantidad_mujeres_inicial' => 'nullable|array',
            'cantidad_hombres_primaria' => 'nullable|array',
            'cantidad_mujeres_primaria' => 'nullable|array',
            'cantidad_hombres_secundaria' => 'nullable|array',
            'cantidad_mujeres_secundaria' => 'nullable|array',
        ]);
    
        // Niveles con los campos correspondientes para hombres y mujeres
        $niveles = [
            'inicial' => ['cantidad_hombres_inicial', 'cantidad_mujeres_inicial'],
            'primaria' => ['cantidad_hombres_primaria', 'cantidad_mujeres_primaria'],
            'secundaria' => ['cantidad_hombres_secundaria', 'cantidad_mujeres_secundaria']
        ];
    
        // Iterar sobre los niveles (inicial, primaria, secundaria)
        foreach ($niveles as $nivel => $campos) {
            $campoHombres = $campos[0];
            $campoMujeres = $campos[1];
    
            // Verificar si existen los campos en la solicitud
            if ($request->has($campoHombres) && is_array($request->$campoHombres)) {
                // Iterar sobre los grados
                foreach ($request->$campoHombres as $grado => $paralelos) {
                    // Iterar sobre los paralelos de cada grado
                    foreach ($paralelos as $paralelo => $cantidadHombres) {
                        // Obtener la cantidad de mujeres (si no existe, asignar 0)
                        $cantidadMujeres = $request->$campoMujeres[$grado][$paralelo] ?? 0;
    
                        // Guardar registro para hombres si la cantidad es mayor a 0
                        if ($cantidadHombres > 0) {
                            Estudiante::create([
                                'unidad_educativa_id' => $request->unidad_educativa_id,
                                'nivel' => $nivel,
                                'grado' => $grado,
                                'paralelo' => $paralelo,
                                'cantidad_hombres' => $cantidadHombres,
                                'cantidad_mujeres' => 0,
                                'sexo' => 'Hombre',
                            ]);
                        }
    
                        // Guardar registro para mujeres si la cantidad es mayor a 0
                        if ($cantidadMujeres > 0) {
                            Estudiante::create([
                                'unidad_educativa_id' => $request->unidad_educativa_id,
                                'nivel' => $nivel,
                                'grado' => $grado,
                                'paralelo' => $paralelo,
                                'cantidad_hombres' => 0,
                                'cantidad_mujeres' => $cantidadMujeres,
                                'sexo' => 'Mujer',
                            ]);
                        }
                    }
                }
            }
        }
    
        // Redirigir después de guardar los datos
        return redirect()->route('estudiantes.index')->with('success', 'Estudiantes registrados correctamente');
    }
    

    public function update(Request $request, Estudiante $estudiante)
    {
       // dd($estudiante);
        $request->validate([
            'unidad_educativa_id' => 'required|exists:unidades_ed,id', // Si este campo se incluye
            'cantidad' => 'required|integer|min:1',
            'sexo' => 'required|in:masculino,femenino',
            'grado' => 'required|array',
            'paralelo' => 'required|array',
        ]);
    

        $estudiante->grado = json_encode($request->grado);
        $estudiante->paralelo = json_encode($request->paralelo);
        $estudiante->cantidad = $request->cantidad;
        $estudiante->sexo = $request->sexo;
        
        if ($request->has('unidad_educativa_id')) {
            $estudiante->unidad_educativa_id = $request->unidad_educativa_id;
        }
    
        $estudiante->save(); 
    
        return redirect()->route('estudiantes.index')->with('success', 'Estudiante actualizado con éxito.');
    }

    public function destroy(Estudiante $estudiante)
    {
        $estudiante->delete();
        return redirect()->route('estudiantes.index')->with('success', 'Estudiante eliminado con éxito.');
    }
    public function show()
    {
        // Agrupa los datos por unidad educativa y sexo y cuenta la cantidad de estudiantes
        $reporteDatos = Estudiante::with('unidadEducativa')
            ->select('unidad_educativa_id', 'sexo', DB::raw('count(*) as total'))
            ->groupBy('unidad_educativa_id', 'sexo')
            ->get()
            ->groupBy('unidad_educativa_id');
    
        // Calcula el total general de estudiantes
        $totalEstudiantes = Estudiante::count();
    
        // Pasar los datos a la vista
        return view('estudiantes.reporte', compact('reporteDatos', 'totalEstudiantes'));
    }

}
