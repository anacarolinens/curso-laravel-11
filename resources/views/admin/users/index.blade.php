<x-app-layout>
    @extends('admin.layouts.app')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Usuários') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @include('admin.users.partials.breadcrumb')

                    <div class="flex justify-between items-center w-full">
                       <div class="flex justify-between items-center w-full">

                            <form action="{{ route('users.index') }}" method="GET" class="flex items-center px-4 py-1 rounded-md border-2 overflow-hidden w-3/4 bg-white dark:bg-gray-700">
                                <input
                                    type="text"
                                    name="search"
                                    placeholder="Buscar por nome ou email"
                                    value="{{ request()->search }}"
                                    class="w-full bg-transparent text-gray-600 dark:text-gray-300 text-sm border-none focus:outline-none focus:ring-0"
                                />
                                <button type="submit" class="bg-transparent border-none p-0 m-0 ml-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192.904 192.904" width="16px" class="fill-gray-600 dark:fill-gray-300">
                                        <path d="m190.707 180.101-47.078-47.077c11.702-14.072 18.752-32.142 18.752-51.831C162.381 36.423 125.959 0 81.191 0 36.422 0 0 36.423 0 81.193c0 44.767 36.422 81.187 81.191 81.187 19.688 0 37.759-7.049 51.831-18.751l47.079 47.078a7.474 7.474 0 0 0 5.303 2.197 7.498 7.498 0 0 0 5.303-12.803zM15 81.193C15 44.694 44.693 15 81.191 15c36.497 0 66.189 29.694 66.189 66.193 0 36.496-29.692 66.187-66.189 66.187C44.693 147.38 15 117.689 15 81.193z"></path>
                                    </svg>
                                </button>
                            </form>

                            <a href="{{ route('users.create') }}"
                            class="bg-blue-700 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition-all duration-300 ml-4 w-1/6 text-center"
                            aria-label="Cadastrar Novo Usuário">
                                <i class="fa-solid fa-plus" aria-hidden="true"></i>
                                Cadastrar
                            </a>
                        </div>
                    </div>

                    <x-alert/>
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm mt-5 rounded">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-200">
                            <thead class="text-xs text-black uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-300">
                                <tr>
                                    <th scope="col" class="px-6 py-4 text-center">Nome</th>
                                    <th scope="col" class="px-6 py-4 text-center">Email</th>
                                    <th scope="col" class="px-6 py-4 text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 dark:text-gray-300 text-sm font-light">
                                @forelse ($users as $user)
                                    <tr class="bg-white dark:bg-gray-800 border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-200">
                                        <td class="px-6 py-4 text-center">{{ $user->name }}</td>
                                        <td class="px-6 py-4 text-center">{{ $user->email }}</td>
                                        <td class="px-2 py-3 text-center">
                                            <a href="{{ route('users.edit', $user->id) }}" class="px-4" title='Editar' aria-label="Editar {{ $user->name }}">
                                                <i class="fa-solid fa-pen-to-square text-blue-500 hover:text-blue-700 text-base transition-all duration-300"></i>
                                            </a>
                                            <a href="{{ route('users.show', $user->id) }}" class="px-4" title="Detalhes" aria-label="Ver detalhes de {{ $user->name }}">
                                                <i class="fa-solid fa-circle-info text-green-500 hover:text-green-700 text-base transition-all duration-300"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center py-4">Nenhum usuário cadastrado</td>
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
