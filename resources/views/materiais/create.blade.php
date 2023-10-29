@extends('dashboard')
@section('content')
<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <h2 class="text-2xl font-semibold mb-4">Cadastrar Novo Material</h2>
        <form class="form" method="POST" action="{{ route('materiais.store') }}">
            @csrf
            <table class="min-w-full divide-y divide-gray-200">
                <tbody class="divide-y divide-gray-200">
                    @foreach ($material as $ma)
                    <label for="material" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tipos de Material:</label>
                    <input type="radio" name="materials_id" id="material{{ $ma->id }}" value="{{ $ma->id }}" class="mr-2">
                    <label for="material{{ $ma->id }}" class="text-sm">&nbsp;&nbsp;REF: {{ $ma->id }} &nbsp;&nbsp; Tipo: {{ $ma->tipo }}</label>
                    @endforeach
                </tbody>
            </table>
            <div class="mb-4">
                <label for="nome" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nome:</label>
                <input type="text" name="nome" id="nome" required
                    class="border-gray-300 dark:border-gray-600 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border rounded-md bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
            </div>
            <div class="mb-4">
                <label for="cor" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cor:</label>
                <input type="text" name="cor" id="cor" required
                    class="border-gray-300 dark:border-gray-600 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border rounded-md bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
            </div>
            <div class="mb-4">
                <label for="altura" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Altura:</label>
                <input type="float" name="altura" id="altura" required
                    class="border-gray-300 dark:border-gray-600 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border rounded-md bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
            </div>
            <div class="mb-4">
                <label for="largura" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Largura:</label>
                <input type="float" name="largura" id="largura" required
                    class="border-gray-300 dark:border-gray-600 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border rounded-md bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
            </div>
            <div class="mb-4">
                <label for="espessura" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Espessura:</label>
                <input type="float" name="espessura" id="espessura" required
                    class="border-gray-300 dark:border-gray-600 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border rounded-md bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
            </div>
            <div class="mb-4">
                <label for="caracteristicas" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Características:</label>
                <input type="text" name="caracteristicas" id="caracteristicas" required
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
