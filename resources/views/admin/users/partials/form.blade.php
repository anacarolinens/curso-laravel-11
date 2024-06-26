{{-- @include('admin.includes.errors') --}}
<x-alert/>

@csrf()

<div class="flex justify-center items-center h-full">
    <div class="w-96">
        <div class="mb-4">
            <label for="name" class="block text-sm text-gray-600 dark:text-gray-400">Nome</label>
            <input id="name" class="rounded border border-gray-300 px-3 py-2 w-full focus:outline-none focus:border-blue-500" type="text" name="name" placeholder="Digite aqui o seu nome" value="{{ $user->name ?? old('name') }}">
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm text-gray-600 dark:text-gray-400">Email</label>
            <input id="email" class="rounded border border-gray-300 px-3 py-2 w-full focus:outline-none focus:border-blue-500" type="email" name="email" placeholder="Digite aqui o seu email" value="{{ $user->email ?? old('email') }}">
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm text-gray-600 dark:text-gray-400">Senha</label>
            <input id="password" class="rounded border border-gray-300 px-3 py-2 w-full focus:outline-none focus:border-blue-500" type="password" name="password" placeholder="Digite aqui a sua senha">
        </div>
    </div>
</div>
<div class="mt-6 flex justify-center">
    <x-secondary-button x-on:click="$dispatch('close')">
        {{ __('Cancelar') }}
    </x-secondary-button>

    <button type="submit" class="ml-3 text-white bg-blue-700 hover:bg-blue-900 py-2 px-4 rounded">
        {{ __('Salvar') }}
    </button>
</div>
