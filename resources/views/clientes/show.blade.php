@extends('dashboard')
@section('content')
<div class="bg-gray-900 text-white p-8">
    <h2 class="text-2xl font-bold mb-4">Itens do cliente cadastrados</h2>

    @if (count($itens) == 0)
    <h3 class="text-red-500">Nenhum Item Encontrado!</h3>
    @else
    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Id</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descrição</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Código do cliente</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Código de produto</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Altura</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Largura</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Código do material</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Preço</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Edição</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
        @foreach ($itens as $i)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">{{ $i->id }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $i->nome }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $i->descricao }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $i->cliente_id }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $i->produto_id }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $i->altura }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $i->largura }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    @php
                        $materialIdArray = unserialize($i->material_id);
                    @endphp
                    @foreach ($materialIdArray as $materialId)
                        {{ $materialId }}
                    ;
                    @endforeach
                </td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $i->largura }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <a href="{{ route('itens.edit', $i->id) }}"
                        class="hover:text-yellow-700 text-yellow-500" style="color:yellow">Editar</a>
                </td>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6" class="px-6 py-4 text-sm font-medium text-gray-500">Total de Clientes Cadastrados:
                    {{ $itens->count() }}</td>
            </tr>
        </tfoot>
    </table>
    @endif

    @if (isset($msg))
    <script>
        alert("{{ $msg }}");
    </script>
    @endif
</div>
@endsection
