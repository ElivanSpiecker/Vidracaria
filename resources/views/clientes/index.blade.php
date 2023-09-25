@extends('dashboard')
@section('content')
<div class="bg-gray-900 text-white p-8">
    <h2 class="text-2xl font-bold mb-4">Clientes Cadastrados</h2>

    @if (count($clientes) == 0)
    <h3 class="text-red-500">Nenhum Cliente Encontrado!</h3>
    @else
    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Id</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Endereco</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">CPF/CNPJ</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Telefone</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">E-mail</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Edição</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach ($clientes as $c)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">{{ $c->id }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $c->nome }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $c->endereco }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $c->cpf_cnpj }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $c->telefone }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $c->email }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <a href="{{ route('clientes.edit', $c->id) }}"
                        class="hover:text-yellow-700 text-yellow-500" style="color:yellow">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6" class="px-6 py-4 text-sm font-medium text-gray-500">Total de Clientes Cadastrados:
                    {{ $clientes->count() }}</td>
            </tr>
        </tfoot>
    </table>
    @endif

    <div class="mt-4">
        <a href="{{ route('clientes.create') }}"
            class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md">Criar Cliente</a>
    </div>

    @if (isset($msg))
    <script>
        alert("{{ $msg }}");
    </script>
    @endif
</div>
@endsection
