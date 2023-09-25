@extends('dashboard')
@section('content')
<div class="bg-gray-900 text-white p-8">
    <h2 class="text-2xl font-bold mb-4">Materiais Cadastrados</h2>

    @if (count($materiais) == 0)
    <h3 class="text-red-500">Nenhum Material Encontrado!</h3>
    @else
    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Id</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantidade</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cor</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nível mínimo</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Características</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Edição</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach ($materiais as $m)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">{{ $m->id }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $m->nome }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $m->quantidade }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $m->cor }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $m->nivelminimo }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $m->caracteristicas }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <a href="{{ route('materiais.edit', $m->id) }}"
                        class="hover:text-yellow-700 text-yellow-500" style="color:yellow">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6" class="px-6 py-4 text-sm font-medium text-gray-500">Total de Materiais Cadastrados:
                    {{ $materiais->count() }}</td>
            </tr>
        </tfoot>
    </table>
    @endif

    <div class="mt-4">
        <a href="{{ route('materiais.create') }}"
            class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md">Criar Material</a>
    </div>

    @if (isset($msg))
    <script>
        alert("{{ $msg }}");
    </script>
    @endif
</div>
@endsection
