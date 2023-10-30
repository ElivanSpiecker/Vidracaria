@extends('dashboard')
@section('content')
<div class="bg-gray-900 text-white p-8">
    <h2 class="text-2xl font-bold mb-4">Atualizar um Cliente</h2>
    <form class="max-w-md mx-auto" id="update-form" method="POST" action="{{ route('clientes.update', $cliente->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="nome" class="block text-sm font-semibold mb-2">Nome:</label>
            <input type="text" name="nome" id="nome" required value="{{ $cliente->nome }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 bg-gray-800 text-white">
        </div>
        <div class="mb-4">
            <label for="endereco" class="block text-sm font-semibold mb-2">Endereco:</label>
            <input type="text" name="endereco" id="endereco" required value="{{ $cliente->endereco }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 bg-gray-800 text-white">
        </div>
        <div class="mb-4">
            <label for="cpf/cnpj" class="block text-sm font-semibold mb-2">CPF:</label>
            <input type="text" name="cpf_cnpj" placeholder="xxx.xxx.xxx-xx" pattern="^\d{3}.\d{3}.\d{3}-\d{2}$" id="cpf_cnpj" required value="{{ $cliente->cpf_cnpj }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 bg-gray-800 text-white">
        </div>
        <div class="mb-4">
            <label for="telefone" class="block text-sm font-semibold mb-2">Telefone:</label>
            <input type="text" name="telefone" placeholder="(xx)xxxxx-xxxx" pattern="^\(\d{2}\)\d{5}-\d{4}$" id="telefone" required value="{{ $cliente->telefone }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 bg-gray-800 text-white">
        </div>
        <div class="mb-4">
            <label for="email" class="block text-sm font-semibold mb-2">E-mail:</label>
            <input type="text" name="email" required pattern="[a-zA-Z0-9.-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}" placeholder="seuemail@provedor.com" id="email" value="{{ $cliente->email }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 bg-gray-800 text-white">
        </div>
        <div class="flex space-x-4">
            <button form="update-form" type="submit" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-md cursor-pointer" style="background-color:green">Salvar</button>
            
            <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-md cursor-pointer" form="delete-form" type="submit" value="Excluir">Excluir</button>
        </div>
    </form>
    <form method="POST" class="form hidden" id="delete-form" action="{{ route('clientes.destroy', $cliente->id) }}">
        @csrf
        @method('DELETE')
    </form>
</div>
@endsection
