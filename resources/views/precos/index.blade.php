@extends('dashboard')
@section('content')
<div class="bg-gray-900 text-white p-8">
    <h2 class="text-2xl font-bold mb-4">Preços Cadastrados</h2>

    @if ($precos->count() == 0)
    <h3 class="text-red-500">Nenhum Preço Encontrado!</h3>
    @else
    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fornecedor</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Material</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Preço</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Edição</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach ($precos as $p)
            @if($id_fornecedor==$p->fornecedor_id)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">{{ $p->fornecedor_nome }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $p->material_tipo }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $p->preco_m3 }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <a href="{{ route('precos.editar', ['fornecedor_id' => $p->fornecedor_id, 'material_id' => $p->material_id]) }}"  
                        class="hover:text-yellow-700 text-yellow-500" style="color:yellow">Editar</a>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
    @endif

    <div class="mt-4">
        <a href="{{ route('precos.criar', $id_fornecedor) }}"
            class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md">Criar Preço</a>
    </div>

    @if (isset($msg))
    <script>
        alert("{{ $msg }}");
    </script>
    @endif
</div>
@endsection
