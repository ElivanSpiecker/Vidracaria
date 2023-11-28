<?php

namespace App\Http\Controllers;

use App\Models\Fornecedores;
use App\Models\Materiais;
use App\Models\Material;
use App\Models\Precos;
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
        $preco = Precos::all();
        $fornecedor = Fornecedores::all();
        return view('materiais.create')-> with('preco', $preco)-> with('fornecedor', $fornecedor);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $preco = Precos::where(['fornecedor_id' => $request->input('fornecedor_id'), 'material_id' => $request->input('material_id')])->first();
        $alt = $request->input('altura');
        $larg = $request->input('largura');
        $espe = $request->input('espessura');
        $prm3 = $preco->preco_m3;
        $valor = $alt * $larg * $espe * $prm3;

        $materiais = new Materiais();
        $materiais->material_id = $request->input('material_id');
        $materiais->nome = $request->input('nome');
        $materiais->cor = $request->input('cor');
        $materiais->altura = $request->input('altura');
        $materiais->largura = $request->input('largura');
        $materiais->espessura = $request->input('espessura');
        $materiais->caracteristicas = $request->input('caracteristicas');
        $materiais->preco = $valor;
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
        $materials = Material::all();
        $material = Materiais::find($id);
        if ($material) {
            return view('materiais.edit')->with('material', $material)->with('materials', $materials);
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
        $alt = $materiais->altura;
        $larg = $materiais->largura;
        $espe = $materiais->espessura;
        $prm3 =  $materiais->preco / $alt / $larg / $espe;

        $alt2 = $request->input('altura');
        $larg2 = $request->input('largura');
        $espe2 = $request->input('espessura');
        $valor = $alt2 * $larg2 * $espe2 * $prm3;

        $materiais->nome = $request->input('nome');
        $materiais->cor = $request->input('cor');
        $materiais->altura = $request->input('altura');
        $materiais->largura = $request->input('largura');
        $materiais->espessura = $request->input('espessura');
        $materiais->caracteristicas = $request->input('caracteristicas');
        $materiais->preco = $valor;
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
