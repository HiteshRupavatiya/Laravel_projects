<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use App\Models\User;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    public function getUser($id){
        $user = Phone::find($id)->user;
        return $user;
    }
}
