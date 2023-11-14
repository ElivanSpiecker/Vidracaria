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
        $fornecedor = Fornecedores::find($id);
        $material - Material::find($id);
        return view('precos.index')->with('precos', $precos)->with('fornecedor', $fornecedor);
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
        $precos = new Precos();
        $precos->material_id = $request->input('materials_id');
        $precos->fornecedor_id = $request->input('fornecedor_id');
        $precos->preco_m3 = $request->input('preco_m3');
        $precos->save();

        $precos = Precos::all();
        $material = Material::find($request->input('materials_id'));
        $fornecedor = Fornecedores::find($request->input('fornecedor_id'));

        return view('precos.index')
            ->with('precos', $precos)
            ->with('material', $material)
            ->with('fornecedor', $fornecedor)
            ->with('msg', 'Preço cadastrado!');
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
        $preco = Precos::find($id);
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
