@extends('admin.layouts.app')

@section('title', 'Detalhes do Usuário')

@section('content')

    <div class="py-6">
         <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-500">Editar Usuário</h2>
    </div>



    <ul class="max-w-md space-y-1 text-gray-500 list-inside list-none">
        <li><strong>Nome: </strong>{{ $user->name }}</li>
        <li><strong>Email: </strong>{{ $user->email }}</li>
    </ul>

    <x-alert/>

    {{-- @can('is-owner', $user)
        Pode deletar
    @endcan --}}

    @can('is-admin')
    <form action="{{ route('users.destroy', $user->id )}}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="text-white bg-red-700 hover:bg-red-800 py-2 px-4 rounded mt-5">Deletar</button>
    </form>
    @endcan

@endsection
