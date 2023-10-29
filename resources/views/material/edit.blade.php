@extends('dashboard')
@section('content')
<div class="bg-gray-900 text-white p-8">
    <h2 class="text-2xl font-bold mb-4">Atualizar um Material</h2>
    <form class="max-w-md mx-auto" id="update-form" method="POST" action="{{ route('material.update', $materials->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="tipo" class="block text-sm font-semibold mb-2">Tipo:</label>
            <input type="text" name="tipo" id="tipo" required value="{{ $materials->tipo }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 bg-gray-800 text-white">
        </div>
        <div class="mb-4">
            <label for="nivelminimo" class="block text-sm font-semibold mb-2">Nível mínimo:</label>
            <input type="text" name="nivelminimo" id="nivelminimo" required value="{{ $materials->nivelminimo }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 bg-gray-800 text-white">
        </div>
        <div class="flex space-x-4">
            <button form="update-form" type="submit" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-md cursor-pointer" style="background-color:green">Salvar</button>
            
            <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-md cursor-pointer" form="delete-form" type="submit" value="Excluir">Excluir</button>
        </div>
    </form>
    <form method="POST" class="form hidden" id="delete-form" action="{{ route('material.destroy', $materials->id) }}">
        @csrf
        @method('DELETE')
    </form>
</div>
@endsection
