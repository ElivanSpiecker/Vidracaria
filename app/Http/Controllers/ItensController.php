<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\Itens;
use App\Models\Produtos;
use App\Models\Materiais;
use Illuminate\Http\Request;

class ItensController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $itens = Itens::all();
        return view('itens.index')->with('itens', $itens);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produtos = Produtos::all();
        $materiais = Materiais::all();
        $clientes = Clientes::all();

        return view('itens.create', ['produtos' => $produtos, 'materiais' => $materiais, 'clientes' => $clientes]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //area abertura
        $alt = $request->input('altura');
        $larg = $request->input('largura');
        $aream2 = $alt * $larg;

        // Serializar
        $materiaisusados = serialize($request->input('material_ids'));

        // Desserializar
        $materialArray = unserialize($materiaisusados);
        $materiais = 0;

        foreach ($materialArray as $m) {
            $material = Materiais::find($m);
            $preco = $material->preco / ($material->altura * $material->largura);
            $materiais += $preco*$aream2;

            if($alt>$larg){
                if($material->altura > $material->largura){
                    $material->altura -= $larg;
                }
                else{
                    $material->largura -=$larg;
                }
            }
            else{
                if($material->altura > $material->largura){
                    $material->altura -= $alt;
                }
                else{
                    $material->largura -=$alt;
                }
            }
            $preco = $preco * $material->altura * $material->largura;
            $material->preco = $preco;
            $material->save();
        }


        $itens = new Itens();
        $itens->nome = $request->input('nome');
        $itens->descricao = $request->input('descricao');
        $itens->cliente_id = $request->input('cliente_id');
        $itens->produto_id = $request->input('produto_id');
        $itens->altura = $request->input('altura');
        $itens->largura = $request->input('largura');
        $itens->material_id = serialize($request->input('material_ids'));
        $itens->preco =$materiais;
        $itens->save();
        $itens = Itens::all();
        return view('itens.index')->with('itens', $itens)
            ->with('msg', 'Pedido cadastrado!');
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
        $item = Itens::find($id);
        if ($item) {
            return view('itens.edit')->with('item', $item);
        } else {
            $itens = Itens::all();
            return view('itens.index')->with('itens', $itens)
                ->with('msg', 'Item não encontrado!');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $itens = Itens::find($id);
        $itens->nome = $request->input('nome');
        $itens->descricao = $request->input('descricao');
        $itens->cliente_id = $request->input('cliente_id');
        $itens->altura = $request->input('altura');
        $itens->largura = $request->input('largura');
        $itens->save();
        $itens = Itens::all();
        return view('itens.index')->with('itens', $itens)
            ->with('msg', 'Item atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $itens = Itens::find($id);
        $itens->delete();
        $itens = Itens::all();
        return view('itens.index')->with('itens', $itens)
            ->with('msg', "Item foi excluído!");
    }
}
