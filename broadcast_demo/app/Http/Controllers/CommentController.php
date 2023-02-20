<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function getPostFromComments($id){
        $post = Comment::find($id)->post;
        return $post;
    }
}
