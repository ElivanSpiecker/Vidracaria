<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Sistema de gerenciamento') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="content">
                        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                            Seja Bem-vindo a Tela de Início do Sistema de Gerenciamento da Vidraçaria
                        </h1>
                        @if(Auth::user()->id!=1)
                        <h2 class="font-semibold text-sm text-red-600 leading-tight">
                            Se não for ADMINISTRADOR, aguarde até o acesso ser concedido.
                        </h2>
                        @endif
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>