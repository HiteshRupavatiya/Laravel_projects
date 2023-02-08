<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    public function comments(){
        return $this->morphMany(Comment::class,'commentable');
    }

    public function latestVideoComment(){
        return $this->morphOne(Comment::class,'commentable')->latestOfMany();
    }

    public function oldestVideoComment(){
        return $this->morphOne(Comment::class,'commentable')->oldestOfMany();
    }
}
