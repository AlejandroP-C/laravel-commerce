<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{


    public function index()
    {
        return view('admin.users.index');
    }

    public function create()
    {

        return view('admin.home');
    }


    public function store(Request $request)
    {



        return redirect()->route('admin.home');
    }


    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }


    public function edit(User $user)
    {

        $roles = Role::all();

        return view('admin.users.edit', compact('user', 'roles'));
    }


    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        return redirect()->route('admin.users.edit', $user)->with('info', 'Se asignó los roles correctamente');
    }

    public function destroy(User $user)
    {

        $user->delete();


        return redirect()->route('admin.users.index', $user)->with('info', 'El usuario que debio hacer ian ha sido eliminado');
    }
}
