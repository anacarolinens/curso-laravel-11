<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users =  User::paginate(25); //User::all();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(StoreUserRequest $request)
    {
        User::create($request->all());

        return redirect()
            ->route('users.index')
            ->with('success', 'Usuário criado com sucesso!');
    }

    public function edit(string $id)
    {
        // $user = User::where('id','=', $id)->first();
        // $user = User::where('id', $id)->firstOrFail();
        // $user = User::where('id', $id)->firstOrFail();

        if (!$user = User::find($id)) {
            return redirect()
                ->route('users.index')
                ->with('warning', 'Usuário não encontrado!');
        }

        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        if (!$user = User::find($id)) {
            return back()
                ->with('warning', 'Usuário não encontrado!');
        }
        $user->update($request->only([
            'name',
            'email',
        ]));

        return redirect()
            ->route('users.index')
            ->with('success', 'Usuário atualizado com sucesso!');
    }
}