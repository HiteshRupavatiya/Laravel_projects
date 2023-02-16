<?php

namespace App\Http\Controllers;
use App\Http\Traits\QueryTrait;

use Illuminate\Http\Request;

class UserController extends Controller
{
    use QueryTrait;

    public function getUser($id){
        $data = $this->getUserDetails($id);
        return $data;
    }
}
