<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actividad;

class ActividadesController extends Controller
{
    public function index()
    {
        $actividades = Actividad::all();
        return view('Actividades.index',compact('actividades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Actividades.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //dd($request);

        $request->validate([
            'nombreAct' => 'required|string',
            'fechaI' => 'required|date',
            'fechaF' => 'required|date',
            'descripcionA' => 'required|string',
          ]);
          Actividad::create($request->all());
          return redirect()->route('actividades.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $centroEd = CentrosE::findOrFail($id);
        return view('CentrosEducacion.edit',compact('centroEd'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $actividad = Actividad::findOrFail($id);
        return view('Actividades.edit',compact('actividad'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombreAct' => 'required|string',
            'fechaI' => 'required|date',
            'fechaF' => 'required|date',
            'descripcionA' => 'required|string',
          ]);

          $actividad = Actividad::findOrFail($id);

          $actividad->update($request->all());

          return redirect()->route('actividades.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $actividad = Actividad::findOrFail($id);
        $actividad->delete();
        return redirect()->route('actividades.index');
    }
}
