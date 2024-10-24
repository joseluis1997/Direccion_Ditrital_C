<?php

namespace App\Http\Controllers;
use App\Models\UnidadesE;
use App\Models\Nucleo; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UnidadesEducativasController extends Controller
{
    public function index()
    {
        //$UnidadesEd = UnidadesE::all();
        $UnidadesEd = UnidadesE::with('nucleo')->get();
        //dd($UnidadesEd[0]->Nucleo->descripcionG );
        return view('UnidadesEducativas.index',compact('UnidadesEd'));
    }
    public function create()
    {
        $nucleos = Nucleo::all(); 
        return view('UnidadesEducativas.create', compact('nucleos'));
    }
    public function store(Request $request)
    {
        
        $request->validate([
            'nombreUE' => 'required|string',
            'nombreDir' => 'required|string',
            'nombreJE' => 'required|string',
            'codigosie' => 'required|string',
            'nivelEd' => 'required|array',
            'nivelEd.*' => 'string', 
            'cantidadE' => 'required|string',
            'cantidadM' => 'required|string',
            'cantidadV' => 'required|string',
            'descripcionG' => 'required|string',
            'id_nucleo' => 'required|exists:nucleos,id',
          ]);

          
          UnidadesE::create([
            'nombreUE' => $request->nombreUE,
            'nombreDir' => $request->nombreDir,
            'nombreJE' => $request->nombreJE,
            'codigosie' => $request->codigosie,
            'nivelEd' => implode(',', $request->nivelEd), // Guardar como texto separado por comas
            'cantidadE' => $request->cantidadE,
            'cantidadM' => $request->cantidadM,
            'cantidadV' => $request->cantidadV,
            'descripcionG' => $request->descripcionG,
            'id_nucleo' => $request->id_nucleo,
        ]);
          return redirect()->route('UnidadesEducativas.index');

    }
    public function show(string $id)
    {
    }
    public function edit(string $id)
    {
        $unidadEducativa = UnidadesE::with('nucleo')->findOrFail($id);
        $nucleos = Nucleo::all();
        $nivelesEducativos = explode(',', $unidadEducativa->nivelEd);
        return view('UnidadesEducativas.edit', compact('unidadEducativa', 'nucleos', 'nivelesEducativos'));
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombreUE' => 'required|string',
            'nombreDir' => 'required|string',
            'nombreJE' => 'required|string',
            'codigosie' => 'required|string',
            'nivelEd' => 'required|array',
            'nivelEd.*' => 'string',
            'cantidadE' => 'required|string',
            'cantidadM' => 'required|string',
            'cantidadV' => 'required|string',
            'descripcionG' => 'required|string',
            'id_nucleo' => 'required|exists:nucleos,id',
        ]);

        $unidad = UnidadesE::findOrFail($id);

        $unidad->update([
            'nombreUE' => $request->nombreUE,
            'nombreDir' => $request->nombreDir,
            'nombreJE' => $request->nombreJE,
            'codigosie' => $request->codigosie,
            'nivelEd' => implode(',', $request->nivelEd),
            'cantidadE' => $request->cantidadE,
            'cantidadM' => $request->cantidadM,
            'cantidadV' => $request->cantidadV,
            'descripcionG' => $request->descripcionG,
            'id_nucleo' => $request->id_nucleo,
        ]);

        return redirect()->route('UnidadesEducativas.index')->with('success', 'Unidad Educativa modificada exitosamente.');
    }
    public function destroy(string $id)
    {
        $unidadEd = UnidadesE::findOrFail($id);
        $unidadEd->delete();
    
        return redirect()->route('UnidadesEducativas.index')->with('success', 'Unidad Educativa eliminada con éxito.');
    }
}
