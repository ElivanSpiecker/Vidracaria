<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Informação de todos os perfis') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Atualize as informações de tipos das contas.") }}
        </p>
    </header>


    @csrf
    @method('patch')

    @if (count($contas) == 1)
    <h3 class="text-red-500">Nenhuma Conta Encontrada!</h3>
    @else
    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">E-mail</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach ($contas as $c)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">{{ $c->name }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $c->email }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $c->type }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <a href="{{ route('admin.edit', $c->id) }}" class="hover:text-yellow-700 text-yellow-500" style="color:yellow">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6" class="px-6 py-4 text-sm font-medium text-gray-500">Total de Contas Cadastradas:
                    {{ $contas->count() }}
                </td>
            </tr>
        </tfoot>
    </table>
    @endif
    </div>
</section>