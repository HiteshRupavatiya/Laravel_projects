<?php

namespace App\Http\Controllers;

use App\Models\Singer;
use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function add_song(){
        $song = new Song();
        $song->title = "vaccine";
        $song->save();
    }

    public function show_song($id){
        $song = Singer::find($id)->songs;
        return $song;
    }
}
