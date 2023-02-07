<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function add_post($id){
        $author = Author::find($id);

        $post = new Post();
        $post->title = "first Post 2";
        $post->cat = "practice 2";
        $author->post()->save($post);
    }

    public function show_post($id){
        $post = Author::find($id)->post;
        return $post;
    }
}
