<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Produtos;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Produtos::all();
        return view('produtos.index')->with('produtos', $produtos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $materiais = Material::all();
        return view('produtos.create')->with('materiais', $materiais);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $produtos = new Produtos();
        $produtos->nome = $request->input('nome');
        $produtos->descricao = $request->input('descricao');
        $produtos->material_id = serialize($request->input('material_ids'));

        // Processar o upload da imagem
        if ($request->hasFile('imagem')) {   
            $imagem = $request->imagem;
            $extension = $imagem->extension();
            $nomeImagem = md5(time()) . '.' . $extension;
            $request->file('imagem')->move(public_path('img'), $nomeImagem);
            
            // Lendo a imagem e convertendo para binário

            // Atualizando o modelo com o caminho da imagem
            $produtos->imagem = $nomeImagem;
        } else {
            $produtos->imagem = null;
        }

        $produtos->save();

        $produtos = Produtos::all();
        return view('produtos.index')->with('produtos', $produtos)
            ->with('msg', 'Produto cadastrado!');
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
        $produto = Produtos::find($id);
        if ($produto) {
            return view('produtos.edit')->with('produto', $produto);
        } else {
            $produtos = Produtos::all();
            return view('produtos.index')->with('produtos', $produtos)
                ->with('msg', 'Produto não encontrado!');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $produtos = Produtos::find($id);
        $produtos->nome = $request->input('nome');
        $produtos->descricao = $request->input('descricao');
        $produtos->save();
        $produtos = Produtos::all();
        return view('produtos.index')->with('produtos', $produtos)
            ->with('msg', 'Produto atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produtos = Produtos::find($id);
        $produtos->delete();
        $produtos = Produtos::all();
        return view('produtos.index')->with('produtos', $produtos)
            ->with('msg', "Produto foi excluído!");
    }
}