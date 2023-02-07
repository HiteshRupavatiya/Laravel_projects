<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function add_project(){
        $project = new Project();
        $project->name = "School Management";
        $project->save();
    }
}
