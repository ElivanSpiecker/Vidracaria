@extends('dashboard')
@section('content')
<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <h2 class="text-2xl font-semibold mb-4">Cadastrar Novo Item</h2>

        <form class="form" method="POST" action="{{ route('itens.store') }}">
            @csrf
            <table class="min-w-full divide-y divide-gray-200">
                <tbody class="divide-y divide-gray-200">
                    <label for="produto" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Produtos:</label>
                    @foreach ($produtos as $p)
                    <input type="radio" name="produto_id" id="produto{{ $p->id }}" value="{{ $p->id }}" class="mr-2">
                    <label for="produto{{ $p->id }}" class="text-sm">&nbsp;&nbsp;REF: {{ $p->id }} &nbsp;&nbsp; Nome: {{ $p->nome }} &nbsp;&nbsp; Descrição: {{ $p->descricao }}</label>
                    <br>
                    @endforeach
                </tbody>
            </table>

            <div class="mb-4">
                <label for="nome" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nome:</label>
                <input type="text" name="nome" id="nome" required class="border-gray-300 dark:border-gray-600 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border rounded-md bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
            </div>
            <div class="mb-4">
                <label for="descricao" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Descrição:</label>
                <input type="text" name="descricao" id="descricao" required class="border-gray-300 dark:border-gray-600 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border rounded-md bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
            </div>
            <div class="mb-4">
                <label for="cliente_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cliente_id:</label>
                <select name="cliente_id" id="cliente_id" required class="border-gray-300 dark:border-gray-600 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border rounded-md bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                    @foreach ($clientes as $c)
                    <option value="{{ $c->id }}">{{ $c->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="altura" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Altura:</label>
                <input type="float" name="altura" id="altura" required class="border-gray-300 dark:border-gray-600 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border rounded-md bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
            </div>
            <div class="mb-4">
                <label for="largura" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Largura:</label>
                <input type="float" name="largura" id="largura" required class="border-gray-300 dark:border-gray-600 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border rounded-md bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
            </div>

            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Id</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cor</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Altura</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Largura</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Espessura</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Características</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Selecionar</th>
                    </tr>
                </thead>

                <tbody class="text-center divide-y divide-gray-200">
                    @foreach ($materiais as $m)
                    <tr>
                        <td class="px-6 py-4">{{ $m->id }}</td>
                        <td class="px-6 py-4">{{ $m->nome }}</td>
                        <td class="px-6 py-4">{{ $m->cor }}</td>
                        <td class="px-6 py-4">{{ $m->altura }}</td>
                        <td class="px-6 py-4">{{ $m->largura }}</td>
                        <td class="px-6 py-4">{{ $m->espessura }}</td>
                        <td class="px-6 py-4">{{ $m->caracteristicas }}</td>
                        <td class="px-6 py-4">
                            <input type="checkbox" name="material_ids[]" value="{{ $m->id }}">
                        </td>
                    </tr>
                    @endforeach
                </tbody>

                <tfoot>
                    <tr>
                        <td colspan="8" class="px-6 py-4 text-sm font-medium text-gray-500 text-center">Total de Materiais Cadastrados: {{ $materiais->count() }}</td>
                    </tr>
                </tfoot>
            </table>



            <div class="space-x-2">
                <input type="submit" value="Salvar" class="bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-2 px-4 rounded-md cursor-pointer">
                <input type="reset" value="Limpar" class="bg-gray-400 hover:bg-gray-500 text-white font-semibold py-2 px-4 rounded-md cursor-pointer">
            </div>
        </form>
    </div>
</div>
@endsection