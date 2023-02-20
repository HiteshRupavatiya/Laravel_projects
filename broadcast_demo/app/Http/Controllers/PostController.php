<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getPostComments($id){
        $comments = Post::find($id)->comment;
        return $comments;
    }
}
