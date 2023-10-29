@extends('dashboard')
@section('content')
<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <h2 class="text-2xl font-semibold mb-4">Cadastrar Novo Tipo de Material</h2>
        <form class="form" method="POST" action="{{ route('material.store') }}">
            @csrf
            <div class="mb-4">
                <label for="nome" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tipo:</label>
                <input type="text" name="nome" id="nome" required
                    class="border-gray-300 dark:border-gray-600 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border rounded-md bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
            </div>
            <div class="mb-4">
                <label for="nivelminimo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nível mínimo:</label>
                <input type="float" name="nivelminimo" id="nivelminimo" required
                    class="border-gray-300 dark:border-gray-600 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border rounded-md bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
            </div>
            <div class="space-x-2">
                <input type="submit" value="Salvar"
                    class="bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-2 px-4 rounded-md cursor-pointer">
                <input type="reset" value="Limpar"
                    class="bg-gray-400 hover:bg-gray-500 text-white font-semibold py-2 px-4 rounded-md cursor-pointer">
            </div>
        </form>
    </div>
</div>
@endsection
