<?php

namespace App\Http\Controllers;

use App\Http\Traits\QueryTrait;
use App\Models\Phone;
use Illuminate\Support\Str;
use App\Models\User;
use Faker\Core\File;
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

    public function delete_image($path)
    {
        $deletePath = public_path() . '/images/' . $path;
        return redirect()->back();
    }

    public function fileOperations()
    {
        $file = Storage::disk('local')->put('example.txt', 'Contents'); // store an file to the local disk storage
        $file1 = Storage::put('avatars/1.txt', "hello"); // store an file to the storage folder in app/avatars/1
        if (Storage::disk('local')->exists('avatars/1.txt')) {
            echo "yes" . "<br>"; // print yes if file are exists in storage/avatars directory
        }
        $content = Storage::get('avatars/1.txt'); // get method can read an file content of specified file
        echo $content . "<br>";
        echo asset('storage/example.txt') . "<br>"; // Display and creat an path of storage location and storage class file

        if (Storage::disk('local')->exists('avatars/1.txt')) {
            Storage::download('avatars/1.txt'); // downloads an file with specified directory
        }

        $url = Storage::url('1.txt'); // returns an file storage location of file

        echo $url . "<br>";

        // $url1 = Storage::temporaryUrl( // creates an temporary url name for file
        //     '1.txt' , now()->addMinutes(5)
        // );

        $size = Storage::size('avatars/1.txt'); // returns an file size of specified url

        echo $size . "<br>";

        $time = Storage::lastModified('avatars/1.txt'); // returns an time in milliseconds and hour and minutes format

        echo $time . "<br>";

        $mime = Storage::mimeType('avatars/1.txt'); // returns an file type like text , image etc

        echo $mime . "<br>";

        $path = Storage::path('avatars/1.txt'); // returns an full path of specified file name

        echo $path . "<br>";

        if (Storage::exists('avatars/1.txt')) {
            Storage::delete('avatars/1.txt'); // deletes an specified file in directory
            echo "deleted" . "<br>";
        }

        Storage::put('avatars/1.txt', "hello");
        Storage::put('avatars/2.txt', "hello");

        $list = Storage::files('avatars/'); // returns an array of files name

        print_r($list);

        $files = Storage::allFiles('avatars/'); // returns an array of all files name

        $direcories = Storage::directories('/'); // returns an all direcory name

        $direcoriesAll = Storage::allDirectories('/'); // returns an all direcory name

        echo "<br>";
        print_r($direcories);

        echo "<br>";
        print_r($direcoriesAll);

        echo "<br>";
        print_r($files);

        Storage::makeDirectory('abc'); // creates an directory on storage/app/

        Storage::deleteDirectory('abc'); // deletes an directory on storage/app/

        return $file;
    }

    public function getUserPhone($id){
        $phone = User::find($id)->phone;
        return $phone;
    }
}
