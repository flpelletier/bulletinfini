<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;

class UsersController extends Controller
{
    public function index()
    {
        //
        $users = User::all();
        return view('users.index', compact('users'));
    }
    public function create()
    {
        //
        return view('users.create');
    }
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }
    public function edit($id)
    {
        //
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'password' => 'required|required_with:password_confirmation|same:password_confirmation',
        ]);
        if ($validator->fails()) {
            return redirect()->route("users.create")->withErrors($validator)->withInput();
        }

        $user = new User;

        $user->surname = $request->input('surname');
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('mdp'));
        $user->save();

        return redirect()->route("users.index")->with('success', 'Utilisateurs créé !');
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'same:password_confirmation',
        ]);
        if ($validator->fails()) {
            return redirect()->route("users.edit", $id)->withErrors($validator)->withInput();
        }

        $user->surname = $request->input('surname');
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($request->input('password') != null) {
            $user->password = bcrypt($request->input('password'));
        }
        $user->updated_at = now();
        $user->save();
        return redirect()->route('users.index')
            ->with('success', 'Utilisateur mit à jour');
    }
    public function destroy($id)
    {
        //
        $user = User::find($id);

        $user->delete();

        return redirect()->route("users.index")->with('error', 'Utilisateur supprimé avec succès !');
    }
}
