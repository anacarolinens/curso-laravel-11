{{-- @include('admin.includes.errors') --}}
<x-alert/>

@csrf()
<input class="rounded" type="text" name="name" placeholder="Nome" value="{{ $user->name ?? old('name') }}">
<input class="rounded" type="email" name="email" placeholder="Email" value="{{ $user->email ?? old('email') }}">
<input class="rounded" type="password" name="password" placeholder="Senha">
<button class="text-white bg-blue-700 hover:bg-blue-800 py-2 px-4 rounded mt-5" type="submit">Enviar</button>
