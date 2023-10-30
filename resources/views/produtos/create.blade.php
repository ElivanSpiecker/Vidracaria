@extends('dashboard')
@section('content')
<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <h2 class="text-2xl font-semibold mb-4">Cadastrar Novo Produto</h2>
        <form class="form" method="POST" action="{{ route('produtos.store') }}">
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
                <label for="material1" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Material 1:</label>
                <select name="material1" id="material1" required class="border-gray-300 dark:border-gray-600 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border rounded-md bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                    <option value="-">Nenhum</option>
                    @foreach ($materiais as $m)
                    <option value="{{ $m->id }}">{{ $m->tipo }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="material2" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Material 2:</label>
                <select name="material2" id="material2" required class="border-gray-300 dark:border-gray-600 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border rounded-md bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                    <option value="-">Nenhum</option>
                    @foreach ($materiais as $m)
                    <option value="{{ $m->id }}">{{ $m->tipo }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="material3" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Material 3:</label>
                <select name="material3" id="material3" required class="border-gray-300 dark:border-gray-600 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border rounded-md bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                    <option value="-">Nenhum</option>
                    @foreach ($materiais as $m)
                    <option value="{{ $m->id }}">{{ $m->tipo }}</option>
                    @endforeach
                </select>
            </div>

            <div class="space-x-2">
                <input type="submit" value="Salvar" class="bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-2 px-4 rounded-md cursor-pointer">
                <input type="reset" value="Limpar" class="bg-gray-400 hover:bg-gray-500 text-white font-semibold py-2 px-4 rounded-md cursor-pointer">
            </div>
        </form>
    </div>
</div>
@endsection