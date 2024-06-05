@extends('admin.layouts.app')

@section('title', 'Editar Usuário')

@section('content')

    <h1>Editar Usuário {{ $user->name }}</h1>

    <x-alert/>

    <form action="{{ route('users.update', $user->id )}}" method="POST">
        @csrf()
        @method('put')
        <input type="text" name="name" placeholder="Nome" value="{{ $user->name }}">
        <input type="email" name="email" placeholder="Email" value="{{ $user->email }}">
        <input type="password" name="password" placeholder="Senha">
        <button type="submit">Enviar</button>
    </form>
    </form>

@endsection
