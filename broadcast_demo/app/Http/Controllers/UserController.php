<?php

namespace App\Http\Controllers;

use App\Http\Traits\QueryTrait;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    use QueryTrait;

    public function getUser($id)
    {
        $data = $this->getUserDetails($id);
        return $data;
    }

    public function index()
    {
        $users = User::all();
        return view('upload_image', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:30|unique:users|alpha_num',
            'email' => 'required|max:40|unique:users|email',
            'password' => 'required|max:20|min:5',
            'confirm_password' => 'required|same:password',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $imageName = time() . "." . $request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->image = $imageName;
        $user->remember_token = Str::random(10);
        $user->save();

        return redirect()->route('user.index')->withSuccess("Image Uploaded Successfully...");
    }

    public function download_image($path)
    {
        $downloadpath = public_path() . '/images/' . $path;
        return response()->download($downloadpath);
    }
}
