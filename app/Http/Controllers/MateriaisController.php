<?php

namespace App\Http\Controllers;

use App\Models\Materiais;
use Illuminate\Http\Request;

class MateriaisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materiais = Materiais::all();
        return view('materiais.index')->with('materiais',$materiais);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('materiais.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $materiais = new Materiais();
        $materiais->nome = $request->input('nome');
        $materiais->quantidade = $request->input('quantidade');
        $materiais->cor = $request->input('cor');
        $materiais->nivelminimo = $request->input('nivelminimo');
        $materiais->caracteristicas = $request->input('caracteristicas');
        $materiais->save();
        $materiais = Materiais::all();
        return view('materiais.index')->with('materiais', $materiais)
            ->with('msg', 'Material cadastrado!');
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
        $material = Materiais::find($id);
        if ($material) {
            return view('materiais.edit')->with('material', $material);
        } else {
            $materiais = Materiais::all();
            return view('materiais.index')->with('materiais', $materiais)
                ->with('msg', 'Material não encontrado!');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $materiais = Materiais::find($id);
        $materiais->nome = $request->input('nome');
        $materiais->quantidade = $request->input('quantidade');
        $materiais->cor = $request->input('cor');
        $materiais->nivelminimo = $request->input('nivelminimo');
        $materiais->caracteristicas = $request->input('caracteristicas');
        $materiais->save();
        $materiais = Materiais::all();
        return view('materiais.index')->with('materiais', $materiais)
            ->with('msg', 'Material atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $materiais = Materiais::find($id);
        $materiais->delete();
        $materiais = Materiais::all();
        return view('materiais.index')->with('materiais', $materiais)
            ->with('msg', "Material foi excluído!");
    }
}
