@extends('admin.layouts.app')

@section('title', 'Editar Usuário')

@section('content')
    @include('admin.users.partials.breadcrumb')
    <div class="py-6">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
            Editar Usuário {{ $user->name }}
        </h2>
    </div>
    <form action="{{ route('users.update', $user->id )}}" method="POST">
        @method('put')
        @include('admin.users.partials.form')
    </form>

@endsection
