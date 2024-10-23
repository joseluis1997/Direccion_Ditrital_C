<?php

namespace App\Http\Controllers;
use App\Models\Nucleo;

use Illuminate\Http\Request;

class NucleosController extends Controller
{
    public function index()
    {
       $nucleos = Nucleo::all();
       //$nucleos = Nucleo::with('Unidades')->get();
        //dd($nucleos);
        return view ('Nucleos.index',compact('nucleos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Nucleos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombreNu' => 'required|string',
            'codigo' => 'required|string',
            'descripcionG' => 'required|string',
          ]);

          Nucleo::create($request->all());
          return redirect()->route('nucleos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $nucleo = Nucleo::findOrFail($id);
        return view('Nucleos.edit',compact('nucleo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'nombreNu' => 'required|string',
            'codigo' => 'required|string',
            'descripcionG' => 'required|string',
          ]);
          //dd($request);
          $nucleo = Nucleo::findOrFail($id);
          $nucleo->update($request->all());

          return redirect()->route('nucleos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $nucleo = Nucleo::findOrFail($id);
        $nucleo->delete();

        return redirect()->route('nucleos.index');
    }
}
