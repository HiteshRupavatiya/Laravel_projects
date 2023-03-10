<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function comments(){
        return $this->morphMany(Comment::class,'commentable');
    }

    public function latestPostComment(){
        return $this->morphOne(Comment::class,'commentable')->latestOfMany();
    }

    public function oldestPostComment(){
        return $this->morphOne(Comment::class,'commentable')->oldestOfMany();
    }

    public function tags(){
        return $this->morphToMany(Tag::class,'taggable');
    }
}
