<?php

namespace App\Http\Controllers;

use App\Models\Fornecedores;
use App\Models\Material;
use App\Models\Precos;
use Illuminate\Http\Request;

class PrecoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indice(string $id)
    {
        $precos = Precos::all();

        return view('precos.index')->with('precos', $precos)->with('id_fornecedor', $id);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function criar(string $id)
    {
        $material = Material::all();
        $fornecedor = Fornecedores::find($id);

        if ($fornecedor) {
            return view('precos.create')
                ->with('fornecedor', $fornecedor)
                ->with('material', $material);
        } else {
            $fornecedores = Fornecedores::all();
            return view('fornecedores.index')
                ->with('fornecedores', $fornecedores)
                ->with('msg', 'Fornecedor não encontrado!');
        }
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id_forn = $request->input('fornecedor_id');
        $precos = new Precos();
        $precos->material_id = $request->input('materials_id');
        $precos->fornecedor_id = $request->input('fornecedor_id');
        $precos->preco_m3 = $request->input('preco_m3');
        $precos->fornecedor_nome = $request->input('fornecedor_nome');
        $precos->material_tipo = $request->input('material_tipo');
        $precos->save();

        $precos = Precos::all();

        return view('precos.index')
            ->with('precos', $precos)
            ->with('id_fornecedor', $id_forn)
            ->with('msg', 'Preço cadastrado!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function editar(string $id_fornecedor, string $id_material)
    {
        $preco = Precos::where(['fornecedor_id' => $id_fornecedor, 'material_id' => $id_material])->first();
        if ($preco) {
            return view('precos.edit')->with('preco', $preco);
        } else {
            $preco = Precos::all();
            return view('precos.index')->with('precos', $preco)
                ->with('msg', 'Tipo de Preço não encontrado!');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function updat(Request $request, string $id_fornecedor, string $id_material)
    {
        Precos::where(['fornecedor_id' => $id_fornecedor, 'material_id' => $id_material])
            ->update(['preco_m3' => $request->input('preco_m3')]);

        $precos = Precos::all();

        return view('precos.index')
            ->with('precos', $precos)
            ->with('id_fornecedor', $id_fornecedor)
            ->with('msg', 'Preço atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destro(string $id_fornecedor, string $id_material){
        Precos::where(['fornecedor_id' => $id_fornecedor, 'material_id' => $id_material])->delete();
    }

    public function destroy(string $id)
    {
        $precos = Precos::find($id);
        $precos->delete();
        $precos = Precos::all();
        return view('precos.index')->with('precos', $precos)
            ->with('msg', "Preço foi excluído!");
    }
}
