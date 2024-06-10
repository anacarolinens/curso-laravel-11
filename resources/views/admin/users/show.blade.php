@extends('admin.layouts.app')

@section('title', 'Detalhes do Usuário')

@section('content')

    <h1>Editar Usuário {{ $user->name }}</h1>

    <ul>
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
        <button type="submit">Deletar</button>
    </form>
    @endcan

@endsection
