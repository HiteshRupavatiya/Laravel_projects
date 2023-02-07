<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Mechanic;
use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function add_owner($id){
        $car = Car::find($id);
        $owner = new Owner();
        $owner->name = "hitesh";
        $car->owner()->save($owner);
    }

    public function show_owner($id){
        // $owner = Mechanic::find($id)->car->owner;
        $owner = Mechanic::find($id)->owner;
        return $owner;
    }
}
