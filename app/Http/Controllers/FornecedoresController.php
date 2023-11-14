<?php

namespace App\Http\Controllers;

use App\Models\Fornecedores;
use App\Models\Material;
use Illuminate\Http\Request;

class FornecedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fornecedores = Fornecedores::all();
        return view('fornecedores.index')->with('fornecedores', $fornecedores);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fornecedores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fornecedores = new Fornecedores();
        $fornecedores->nome = $request->input('nome');
        $fornecedores->endereco = $request->input('endereco');
        $fornecedores->cnpj = $request->input('cnpj');
        $fornecedores->telefone = $request->input('telefone');
        $fornecedores->email = $request->input('email');
        $fornecedores->save();
        $fornecedores = Fornecedores::all();
        return view('fornecedores.index')->with('fornecedores', $fornecedores)
            ->with('msg', 'Fornecedor cadastrado!');
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
        $fornecedor = Fornecedores::find($id);
        if ($fornecedor) {
            return view('fornecedores.edit')->with('fornecedor', $fornecedor);
        } else {
            $fornecedores = Fornecedores::all();
            return view('fornecedores.index')->with('fornecedores', $fornecedores)
                ->with('msg', 'Fornecedor não encontrado!');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fornecedores = Fornecedores::find($id);
        $fornecedores->nome = $request->input('nome');
        $fornecedores->endereco = $request->input('endereco');
        $fornecedores->cnpj = $request->input('cnpj');
        $fornecedores->telefone = $request->input('telefone');
        $fornecedores->email = $request->input('email');
        $fornecedores->save();
        $fornecedores = Fornecedores::all();
        return view('fornecedores.index')->with('fornecedores', $fornecedores)
            ->with('msg', 'Fornecedor atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fornecedores = Fornecedores::find($id);
        $fornecedores->delete();
        $fornecedores = Fornecedores::all();
        return view('fornecedores.index')->with('fornecedores', $fornecedores)
            ->with('msg', "Fornecedor foi excluído!");
    }
}
