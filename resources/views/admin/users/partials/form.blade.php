{{-- @include('admin.includes.errors') --}}
<x-alert/>

@csrf()

<input type="text" name="name" placeholder="Nome" value="{{ $user->name ?? old('name') }}">
<input type="email" name="email" placeholder="Email" value="{{ $user->name ?? old('email') }}">
<input type="password" name="password" placeholder="Senha">
<button type="submit">Enviar</button>
