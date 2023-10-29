@extends('dashboard')
@section('content')
<div class="bg-gray-900 text-white p-8">
    <h2 class="text-2xl font-bold mb-4">Atualizar um Material</h2>
    <form class="max-w-md mx-auto" id="update-form" method="POST" action="{{ route('materiais.update', $material->id) }}">
        @csrf
        @method('PUT')
        <table class="min-w-full divide-y divide-gray-200">
                <tbody class="divide-y divide-gray-200">
                    @foreach ($materials as $ma)
                    <label for="material" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tipos de Material:</label>
                    <input type="radio" name="materials_id" id="material{{ $ma->id }}" value="{{ $ma->id }}" class="mr-2">
                    <label for="material{{ $ma->id }}" class="text-sm">&nbsp;&nbsp;REF: {{ $ma->id }} &nbsp;&nbsp; Tipo: {{ $ma->tipo }}</label>
                    @endforeach
                </tbody>
            </table>
        <div class="mb-4">
            <label for="nome" class="block text-sm font-semibold mb-2">Nome:</label>
            <input type="text" name="nome" id="nome" required value="{{ $material->nome }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 bg-gray-800 text-white">
        </div>
        <div class="mb-4">
            <label for="cor" class="block text-sm font-semibold mb-2">Cor:</label>
            <input type="text" name="cor" id="cor" required value="{{ $material->cor }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 bg-gray-800 text-white">
        </div>
        <div class="mb-4">
            <label for="altura" class="block text-sm font-semibold mb-2">Altura:</label>
            <input type="float" name="altura" id="altura" required value="{{ $material->altura }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 bg-gray-800 text-white">
        </div>
        <div class="mb-4">
            <label for="largura" class="block text-sm font-semibold mb-2">Largura:</label>
            <input type="float" name="largura" id="largura" required value="{{ $material->largura }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 bg-gray-800 text-white">
        </div>
        <div class="mb-4">
            <label for="espessura" class="block text-sm font-semibold mb-2">Espessura:</label>
            <input type="float" name="espessura" id="espessura" required value="{{ $material->espessura }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 bg-gray-800 text-white">
        </div>
        <div class="mb-4">
            <label for="caracteristicas" class="block text-sm font-semibold mb-2">Características:</label>
            <input type="text" name="caracteristicas" id="caracteristicas" required value="{{ $material->caracteristicas }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 bg-gray-800 text-white">
        </div>
        <div class="flex space-x-4">
            <button form="update-form" type="submit" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-md cursor-pointer" style="background-color:green">Salvar</button>
            
            <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-md cursor-pointer" form="delete-form" type="submit" value="Excluir">Excluir</button>
        </div>
    </form>
    <form method="POST" class="form hidden" id="delete-form" action="{{ route('materiais.destroy', $material->id) }}">
        @csrf
        @method('DELETE')
    </form>
</div>
@endsection
