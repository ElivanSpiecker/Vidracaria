@extends('dashboard')
@section('content')
@php
    $type = Auth::user()->type;
@endphp
@if($type=='estoque')
@else
<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <h2 class="text-2xl font-semibold mb-4">Cadastrar Novo Produto</h2>
        <form class="form" method="POST" action="{{ route('produtos.store') }} " enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="nome" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nome:</label>
                <input type="text" name="nome" id="nome" required class="border-gray-300 dark:border-gray-600 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border rounded-md bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
            </div>
            <div class="mb-4">
                <label for="descricao" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Descrição:</label>
                <input type="text" name="descricao" id="descricao" required class="border-gray-300 dark:border-gray-600 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border rounded-md bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
            </div>     
            <div class="mb-4">
                <label for="imagem" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Imagem:</label>
                <input type="file" name="imagem" id="imagem" required accept="image/jpeg, image/png" class="border-gray-300 dark:border-gray-600 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border rounded-md bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
            </div>  
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Id</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nível mínimo</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Caminho</th>
                    </tr>
                </thead>

            <tbody class="text-center divide-y divide-gray-200">
                    @foreach ($materiais as $m)
                    <tr>
                        <td class="px-6 py-4">{{ $m->id }}</td>
                        <td class="px-6 py-4">{{ $m->tipo }}</td>
                        <td class="px-6 py-4">{{ $m->nivelminimo }}</td>
                        <td class="px-6 py-4">
                            <input type="checkbox" name="material_ids[]" value="{{ $m->id }}">
                        </td>
                    </tr>
                    @endforeach
            </tbody>
            </table>

            <div class="space-x-2">
                <input type="submit" value="Salvar" class="bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-2 px-4 rounded-md cursor-pointer">
                <input type="reset" value="Limpar" class="bg-gray-400 hover:bg-gray-500 text-white font-semibold py-2 px-4 rounded-md cursor-pointer">
            </div>
        </form>
    </div>
</div>
@endif
@endsection