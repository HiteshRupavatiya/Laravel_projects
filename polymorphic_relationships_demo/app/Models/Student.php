<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // Accessor

    public function getNameAttribute($value){
        return ucfirst($value);
        // return "Mr. ".$value;
    }

    public function setNameAttribute($value){
        $this->attributes['name'] = ucfirst($value);
        // return "Mr. ".$value;
    }

    public function getCityAttribute($value){
        return ucfirst($value);
    }

    // Mutator

    public function setCityAttribute($value){
        $this->attributes['city'] = $value.' India';
    }

    // protected function name() : Attribute {
    //     return Attribute::make(
    //         get: fn ($value) => ucfirst($value),
    //         set: fn ($value) => strtolower($value),
    //     );
    // }
}
