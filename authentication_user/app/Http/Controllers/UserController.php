<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }

    public function register_view()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {  
        $request->validate([
            'email' => 'required|email:rfc,dns',
            'password' => 'required'    
        ]);

        $credintials = $request->only('email','password');

        if (Auth::attempt($credintials)) {
            return redirect()->intended('home')->withSuccess("Signed in...");
        }

        return redirect('login')->withSuccess('Login creaditials are invalid...');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|alpha_num|max:30|unique:users,name',
            'email' => 'required|email|unique:users,email:rfc,dns',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('home');
        }

        return redirect('register')->withSuccess('You Are Signed In...');
    }

    public function home()
    {   
        return view('home');       
        // return redirect('login')->withError('You are not allowed to access');
    }

    public function logout()
    {
        session()->flush();
        Auth::logout();
        return redirect('login');
    }
}
