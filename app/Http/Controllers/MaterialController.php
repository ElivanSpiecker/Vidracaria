<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Precos;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materials = Material::all();
        return view('material.index')->with('materials',$materials);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('material.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $materiais = new Material();
        $materiais->tipo = $request->input('tipo');
        $materiais->nivelminimo = $request->input('nivelminimo');
        $materiais->save();
        $materiais = Material::all();
        return view('material.index')->with('materials', $materiais)
            ->with('msg', 'Tipo Material cadastrado!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $material = Material::find($id);
        if ($material) {
            return view('material.edit')->with('materials', $material);
        } else {
            $materiais = Material::all();
            return view('material.index')->with('materials', $materiais)
                ->with('msg', 'Tipo de Material não encontrado!');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $materiais = Material::find($id);
        $novoTipo = $request->input('tipo');
        $materiais->tipo = $request->input('tipo');
        $materiais->nivelminimo = $request->input('nivelminimo');
        $materiais->save();
        Precos::where('material_id', $id)->update(['material_tipo' => $novoTipo]);
        $materiais = Material::all();
        return view('material.index')->with('materials', $materiais)
            ->with('msg', 'Tipo de Material atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $materiais = Material::find($id);
        $materiais->delete();
        $materiais = Material::all();
        return view('material.index')->with('materials', $materiais)
            ->with('msg', "Tipo de Material foi excluído!");
    }
}
