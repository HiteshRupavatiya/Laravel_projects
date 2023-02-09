<?php

use App\Models\Comment;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Video;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/morph_one',function(){
    $doctor = Doctor::find(1);    
    dump($doctor->name);
    dump($doctor->image);
});

Route::get('/morph_many',function(){
    $post = Post::find(1);
    $comment = Comment::find(1);
    // $video = Video::find(1);
    return $comment->body;
});

Route::get('/morph_many_to_many',function(){
    // $post = Post::find(1);
    $video = Tag::find(1);
    return $video;
});
