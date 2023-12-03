@extends('dashboard')
@section('content')
<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <h2 class="text-2xl font-semibold mb-4">Cadastrar Novo Material</h2>
        <form class="form" method="POST" action="{{ route('materiais.store') }}">
            @csrf
            <table class="min-w-full divide-y divide-gray-200">
                <tbody class="divide-y divide-gray-200">
                    @foreach ($preco as $pre)
                    <label for="preco" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tipos de Material:</label>
                    <input type="hidden" name="fornecedor_id" id="fornecedor_id" value="{{$pre->fornecedor_id}}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 bg-gray-800 text-white" readonly>
                    <input type="radio" name="material_id" id="material_id " value="{{ $pre->material_id }}" class="mr-2">
                    <label for="preco" class="text-sm">&nbsp;&nbsp;REF: {{ $pre->material_id }} &nbsp;&nbsp; Tipo: {{ $pre->material_tipo }} &nbsp;&nbsp; Fornecedor: {{ $pre->fornecedor_nome }} &nbsp;&nbsp; Preço: {{ $pre->preco_m3 }}</label>
                    @endforeach
                </tbody>
            </table>
            <div class="mb-4">
                <label for="nome" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nome:</label>
                <input type="text" name="nome" id="nome" required class="border-gray-300 dark:border-gray-600 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border rounded-md bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
            </div>
            <div class="mb-4">
                <label for="cor" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cor:</label>
                <input type="text" name="cor" id="cor" required class="border-gray-300 dark:border-gray-600 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border rounded-md bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
            </div>
            <div class="mb-4">
                <label for="altura" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Altura (cm):</label>
                <input type="float" name="altura" id="altura" required class="border-gray-300 dark:border-gray-600 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border rounded-md bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
            </div>
            <div class="mb-4">
                <label for="largura" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Largura (cm):</label>
                <input type="float" name="largura" id="largura" required class="border-gray-300 dark:border-gray-600 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border rounded-md bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
            </div>
            <div class="mb-4">
                <label for="espessura" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Espessura (cm):</label>
                <input type="float" name="espessura" id="espessura" required class="border-gray-300 dark:border-gray-600 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border rounded-md bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
            </div>
            <div class="mb-4">
                <label for="caracteristicas" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Características:</label>
                <input type="text" name="caracteristicas" id="caracteristicas" required class="border-gray-300 dark:border-gray-600 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border rounded-md bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
            </div>
            <div class="space-x-2">
                <input type="submit" value="Salvar" class="bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-2 px-4 rounded-md cursor-pointer">
                <input type="reset" value="Limpar" class="bg-gray-400 hover:bg-gray-500 text-white font-semibold py-2 px-4 rounded-md cursor-pointer">
            </div>
        </form>
    </div>
</div>
@endsection