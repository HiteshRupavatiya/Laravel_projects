<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Project;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function add_language($id){
        $project = Project::find($id);
        $language = new Language();
        $language->name = "Python";
        $project->environment()->save($language);
    }
}
