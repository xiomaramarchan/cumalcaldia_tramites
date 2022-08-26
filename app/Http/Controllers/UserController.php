<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function index(){

        $usuarios = User::all();
        return view('admin.users.index', ['usuarios' => $usuarios]);
    }

   
    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $user = new User($request->all());
        $user->save();
        return redirect()->action([UserController::class, 'index']);
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('admin.users.show', ['user' => $user]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->fill($request->all());
        $user->save();
        return redirect()->action([UserController::class, 'index']);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->action([UserController::class, 'index']);
    }
        


}