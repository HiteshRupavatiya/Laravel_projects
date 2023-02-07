<?php

namespace App\Http\Controllers;

use App\Models\Languages;
use App\Models\Project;
use Illuminate\Http\Request;

class LanguagesController extends Controller
{
    public function add_language($id){
        $project = Project::find($id);
        $language = new Languages();
        $language->name = "Python";
        $project->environment()->save($language);
    }
}
