<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index(){

        // seacrh by name, pagianation 10
        $users = User::where('name', 'like', '%' . request('name') . '%')->orderBy('created_at', 'desc')->paginate(10);
        return view('pages.users.index', compact('users'));
    }


    // create
    public function create(){
        return view('pages.users.create');
    }


    // store
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'User created succesfully');
    }



    // edit
    public function edit(User $user){
        return view('pages.users.edit', compact('user'));
    }

    // update
    public function update(Request $request, User $user){

        // Juga melakukan validasi untuk yang terdaftar dan tidak sama dengan id user yang akan diedit maka akan di validasi
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);


        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->role,
            'position' => $request->position,
            'department' => $request->department,
        ]);


        if ($request->password) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect()->route('users.index')->with('success', 'User updated succesfully');
    }


     // destroy
    public function destroy(User $user){
    $user->delete();
       return redirect()->route('users.index')->with('success', 'User deleted succesfully');
    }

}

