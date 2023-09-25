<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Clientes::all();
        return view('clientes.index')->with('clientes',$clientes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $clientes = new Clientes();
        $clientes->nome = $request->input('nome');
        $clientes->endereco = $request->input('endereco');
        $clientes->cpf_cnpj = $request->input('cpf_cnpj');
        $clientes->telefone = $request->input('telefone');
        $clientes->email = $request->input('email');
        $clientes->save();
        $clientes = Clientes::all();
        return view('clientes.index')->with('clientes', $clientes)
            ->with('msg', 'Cliente cadastrado!');
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
        $cliente = Clientes::find($id);
        if ($cliente) {
            return view('clientes.edit')->with('cliente', $cliente);
        } else {
            $clientes = Clientes::all();
            return view('clientes.index')->with('clientes', $clientes)
                ->with('msg', 'Cliente não encontrado!');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $clientes = Clientes::find($id);
        $clientes->nome = $request->input('nome');
        $clientes->endereco = $request->input('endereco');
        $clientes->cpf_cnpj = $request->input('cpf_cnpj');
        $clientes->telefone = $request->input('telefone');
        $clientes->email = $request->input('email');
        $clientes->save();
        $clientes = Clientes::all();
        return view('clientes.index')->with('clientes', $clientes)
            ->with('msg', 'Cliente atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $clientes = Clientes::find($id);
        $clientes->delete();
        $clientes = Clientes::all();
        return view('clientes.index')->with('clientes', $clientes)
            ->with('msg', "Cliente foi excluído!");
    }
}
