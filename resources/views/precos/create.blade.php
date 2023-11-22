@extends('dashboard')
@section('content')
<div class="bg-gray-900 text-white p-8">
    <h2 class="text-2xl font-bold mb-4">Cadastrar Produto Fornecido</h2>
    <form class="form" method="POST" action="{{ route('precos.store') }}">
        @csrf
        @method('POST')
        <label for="type" class="block text-sm font-semibold mb-2">Fornecedor:</label>
        <select type="text" name="fornecedor_id" id="fornecedor_id" required value="{{ $fornecedor->id }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 bg-gray-800 text-white">
            <option value="{{$fornecedor->id}}">{{$fornecedor->nome}}</option>
        </select>
        <label for="fornecedor_nome" class="block text-sm font-semibold mb-2">Nome do Fornecedor:</label>
        <input type="hidden" name="fornecedor_nome" id="fornecedor_nome" value="{{$fornecedor->nome}}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 bg-gray-800 text-white" readonly>
        <tbody class="divide-y divide-gray-200">
        <label for="material" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tipos de Material:</label>    
            @foreach ($material as $ma)
            <input type="radio" name="materials_id" id="material{{ $ma->id }}" value="{{ $ma->id }}" class="mr-2">
            <label for="material{{ $ma->id }}" class="text-sm">&nbsp;&nbsp;REF: {{ $ma->id }} &nbsp;&nbsp; Tipo: {{ $ma->tipo }}</label>
            <input type="hidden" name="material_tipo" id="material_tipo" value="{{$ma->tipo}}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 bg-gray-800 text-white" readonly>
            <br>
            @endforeach
        </tbody>
        <div class="mb-4">
            <label for="preco_m3" class="block text-sm font-semibold mb-2">Preço por m³:</label>
            <input type="float" name="preco_m3" id="preco_m3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 bg-gray-800 text-white">
        </div>
        <div class="space-x-2">
                <input type="submit" value="Salvar"
                    class="bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-2 px-4 rounded-md cursor-pointer">
                <input type="reset" value="Limpar"
                    class="bg-gray-400 hover:bg-gray-500 text-white font-semibold py-2 px-4 rounded-md cursor-pointer">
            </div>
    </form>
</div>
@endsection