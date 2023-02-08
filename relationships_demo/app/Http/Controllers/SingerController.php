<?php

namespace App\Http\Controllers;

use App\Models\Singer;
use App\Models\Song;
use Illuminate\Http\Request;

class SingerController extends Controller
{
    public function add_singer(){
        $singer = new Singer();
        $singer->name = "abc";
        $singer->save();

        $songIds = [1,2,3,4,5];
        $singer->songs()->attach($songIds);
    }

    public function show_singer($id){
        $singer = Song::find($id)->singers;
        return $singer;
    }
}
