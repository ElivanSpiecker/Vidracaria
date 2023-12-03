@extends('dashboard')
@section('content')
<div class="bg-gray-900 text-white p-8">
    <h2 class="text-2xl font-bold mb-4">Atualizar um Item</h2>
    <form class="max-w-md mx-auto" id="update-form" method="POST" action="{{ route('itens.update', $item->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="nome" class="block text-sm font-semibold mb-2">Nome:</label>
            <input type="text" name="nome" id="nome" required value="{{ $item->nome }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 bg-gray-800 text-white">
        </div>
        <div class="mb-4">
            <label for="descricao" class="block text-sm font-semibold mb-2">Descrição:</label>
            <input type="text" name="descricao" id="descricao" required value="{{ $item->descricao }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 bg-gray-800 text-white">
        </div>
        <div class="mb-4">
            <label for="cliente_id" class="block text-sm font-semibold mb-2">Cliente_id:</label>
            <input type="integer" name="cliente_id" id="cliente_id" required value="{{ $item->cliente_id }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 bg-gray-800 text-white">
        </div>
        <div class="mb-4">
            <label for="altura" class="block text-sm font-semibold mb-2">Altura: (cm)</label>
            <input type="float" name="altura" id="altura" required value="{{ $item->altura }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 bg-gray-800 text-white">
        </div>
        <div class="mb-4">
            <label for="largura" class="block text-sm font-semibold mb-2">Largura: (cm)</label>
            <input type="float" name="largura" id="largura" required value="{{ $item->largura }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 bg-gray-800 text-white">
        </div>
        <div class="flex space-x-4">
            <button form="update-form" type="submit" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-md cursor-pointer" style="background-color:green">Salvar</button>
            
            <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-md cursor-pointer" form="delete-form" type="submit" value="Excluir">Excluir</button>
        </div>
    </form>
    <form method="POST" class="form hidden" id="delete-form" action="{{ route('itens.destroy', $item->id) }}">
        @csrf
        @method('DELETE')
    </form>
</div>
@endsection
