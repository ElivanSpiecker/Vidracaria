<section>
    <div class="bg-gray-900 text-white p-8">
        <h2 class="text-2xl font-bold mb-4">Atualizar uma Conta</h2>
        <form class="max-w-md mx-auto" id="update-form" method="POST" action="{{ route('admin.update', $conta->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-sm font-semibold mb-2">Nome:</label>
                <input type="text" name="name" id="name" required value="{{ $conta->name }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 bg-gray-800 text-white">
            </div>
            @if($conta->type=="Admin")
            <div class="mb-4">
                <label for="type" class="block text-sm font-semibold mb-2">Tipo:</label>
                <select type="text" name="type" id="type" required value="{{ $conta->type }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 bg-gray-800 text-white">
                    <option value="Admin">Admin</option>
                </select>
            </div>
            @else
            <div class="mb-4">
                <label for="type" class="block text-sm font-semibold mb-2">Tipo:</label>
                <select type="text" name="type" id="type" required value="{{ $conta->type }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 bg-gray-800 text-white">
                    <option value="estoque">estoque</option>
                    <option value="estoque_e_orçamento">estoque_e_orçamento</option>
                </select>
            </div>
            @endif
            <div class="mb-4">
                <label for="email" class="block text-sm font-semibold mb-2">E-mail:</label>
                <input type="text" name="email" id="email" required value="{{ $conta->email }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 bg-gray-800 text-white">
            </div>
            <div class="flex space-x-4">
                <button form="update-form" type="submit" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-md cursor-pointer" style="background-color:green">Salvar</button>

                <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-md cursor-pointer" form="delete-form" type="submit" value="Excluir">Excluir</button>
            </div>
        </form>
        <form method="POST" class="form hidden" id="delete-form" action="{{ route('admin.destroy', $conta->id) }}">
            @csrf
            @method('DELETE')
        </form>
    </div>
</section>