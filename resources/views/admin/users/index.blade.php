

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Usuários') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @include('admin.users.partials.breadcrumb')

                    <a href="{{ route('users.create') }}"
                        class=" mt-4 bg-blue-700 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    >
                        <i class="fa-solid fa-plus" aria-hidden="true"></i>
                        Cadastrar
                    </a>

                    <x-alert/>
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm mt-5">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-800">
                            <thead class="text-xs text-white uppercase bg-gray-500 dark:text-gray-800">
                                <tr>
                                    <th scope="col" class="px-6 py-4 text-center">Nome</th>
                                    <th scope="col" class="px-6 py-4 text-center">Email</th>
                                    <th scope="col" class="px-6 py-4">Ações</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-light">
                                @forelse ($users as $user)
                                    <tr class="bg-white border-b dark:bg-gray-800 ">
                                        <td class="px-6 py-4 text-center">{{ $user->name }}</td>
                                        <td class="px-6 py-4 text-center">{{ $user->email }}</td>
                                        <td class="px-2 py-3">
                                            <a href="{{ route('users.edit', $user->id) }}" class="px-4" title='Editar'>
                                                <i class="fa-solid fa-pen-to-square text-blue-500 hover:text-blue-700 text-base"></i>
                                            </a>
                                            <a href="{{ route('users.show', $user->id) }}" class="" title="Detalhes">
                                                <i class="fa-solid fa-circle-info text-green-500 hover:text-green-700 text-base"></i>
                                            </a>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="100">Nenhum usuário cadastrado</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="py-4">
                        {{ $users->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


