@extends('dashboard')
@section('content')
@php
    $type = Auth::user()->type;
@endphp
@if($type=='estoque')
@else
<div class="bg-gray-900 text-white p-8">
    <h2 class="text-2xl font-bold mb-4">Atualizar um Preço</h2>
    <form class="max-w-md mx-auto" id="update-form" method="POST" action="{{ route('precos.updat', ['fornecedor_id' => $preco->fornecedor_id, 'material_id' => $preco->material_id]) }}">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="preco_m3" class="block text-sm font-semibold mb-2">Preço:</label>
            <input type="float" name="preco_m3" id="preco_m3" required value="{{ $preco->preco_m3 }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 bg-gray-800 text-white">
        </div>
        <div class="flex space-x-4">
            <button form="update-form" type="submit" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-md cursor-pointer" style="background-color:green">Salvar</button>
            
            <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-md cursor-pointer" form="delete-form" type="submit" value="Excluir">Excluir</button>
        </div>
    </form>
    <form method="POST" class="form hidden" id="delete-form" action="{{ route('precos.destro', ['fornecedor_id' => $preco->fornecedor_id, 'material_id' => $preco->material_id]) }}">
        @csrf
        @method('PUT')
    </form>
</div>
@endif
@endsection
