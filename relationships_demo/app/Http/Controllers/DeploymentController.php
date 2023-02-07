<?php

namespace App\Http\Controllers;

use App\Models\Deployment;
use App\Models\Languages;
use Illuminate\Http\Request;

class DeploymentController extends Controller
{
    public function add_deployment($id){
        $language = Languages::find($id);
        $deployment = new Deployment();
        $deployment->work = "pending";
        $language->deployment()->save($deployment);
    }
}
