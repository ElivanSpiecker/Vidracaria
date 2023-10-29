@extends('dashboard')
@section('content')
<div class="bg-gray-900 text-white p-8">
    <h2 class="text-2xl font-bold mb-4">Tipos Cadastrados</h2>

    @if (count($materials) == 0)
    <h3 class="text-red-500">Nenhum Tipo de Material Encontrado!</h3>
    @else
    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Id</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nível mínimo</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantidade</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Edição</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach ($materials as $ma)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">{{ $ma->id }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $ma->tipo }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $ma->nivelminimo }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $ma->quantidade }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <a href="{{ route('materials.edit', $ma->id) }}"
                        class="hover:text-yellow-700 text-yellow-500" style="color:yellow">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6" class="px-6 py-4 text-sm font-medium text-gray-500">Tipos de Materiais Cadastrados:
                    {{ $materials->count() }}</td>
            </tr>
        </tfoot>
    </table>
    @endif

    <div class="mt-4">
        <a href="{{ route('material.create') }}"
            class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md">Criar Material</a>
    </div>

    @if (isset($msg))
    <script>
        alert("{{ $msg }}");
    </script>
    @endif
</div>
@endsection
