@extends('dashboard')
@section('content')
<div class="bg-gray-900 text-white p-8">
    <h2 class="text-2xl font-bold mb-4">Produtos Cadastrados</h2>

    @if (count($produtos) == 0)
    <h3 class="text-red-500">Nenhum Produto Encontrado!</h3>
    @else
    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Id</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descrição</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Material 1</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Material 2</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Material 3</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Edição</th>
            </tr>
        </thead>    
        <tbody class="divide-y divide-gray-200">
            @foreach ($produtos as $p)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">{{ $p->id }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $p->nome }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $p->descricao }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $p->material1 }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $p->material2 }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $p->material3 }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <a href="{{ route('produtos.edit', $p->id) }}"
                        class="hover:text-yellow-700 text-yellow-500" style="color:yellow">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6" class="px-6 py-4 text-sm font-medium text-gray-500">Total de Produtos Cadastrados:
                    {{ $produtos->count() }}</td>
            </tr>
        </tfoot>
    </table>
    @endif

    <div class="mt-4">
        <a href="{{ route('produtos.create') }}"
            class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md">Criar Produto</a>
    </div>

    @if (isset($msg))
    <script>
        alert("{{ $msg }}");
    </script>
    @endif
</div>
@endsection
