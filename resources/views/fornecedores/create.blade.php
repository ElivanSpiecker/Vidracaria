@extends('dashboard')
@section('content')
<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <h2 class="text-2xl font-semibold mb-4">Cadastrar Novo Fornecedor</h2>
        <form class="form" method="POST" action="{{ route('fornecedores.store') }}">
            @csrf
            <div class="mb-4">
                <label for="nome" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nome:</label>
                <input type="text" name="nome" id="nome" required
                    class="border-gray-300 dark:border-gray-600 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border rounded-md bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
            </div>
            <div class="mb-4">
                <label for="endereco" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Endereco:</label>
                <input type="text" name="endereco" id="endereco" required
                    class="border-gray-300 dark:border-gray-600 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border rounded-md bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
            </div>
            <div class="mb-4">
                <label for="cnpj" class="block text-sm font-medium text-gray-700 dark:text-gray-300">CNPJ:</label>
                <input type="text" placeholder="xx.xxx.xxx/xxxx-xx" pattern="^\d{2}.\d{3}.\d{3}/\d{4}-\d{2}$" name="cnpj" id="cnpj" required
                    class="border-gray-300 dark:border-gray-600 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border rounded-md bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
            </div>
            <div class="mb-4">
                <label for="telefone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Telefone:</label>
                <input type="text" placeholder="(xx)xxxxx-xxxx" pattern="^\(\d{2}\)\d{5}-\d{4}$" name="telefone" id="telefone" required
                    class="border-gray-300 dark:border-gray-600 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border rounded-md bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">E-mail:</label>
                <input type="text" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}" placeholder="seuemail@provedor.com" id="email" required
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
