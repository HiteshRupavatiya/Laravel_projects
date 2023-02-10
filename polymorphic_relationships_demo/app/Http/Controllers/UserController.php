<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(){
        return view('createUser');
    }

    public function add_user(Request $request){
        $request->validate([
            'name' => 'required|unique:users|alpha',
            'email' => 'required|email|unique:users',
            'password' => 'required'  
        ]);

        $user = User::create($request->all());
        return redirect()->back();
    }
}
