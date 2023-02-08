<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    public function patients(){
        return $this->hasManyThrough(Patient::class,Appointment::class);
    }

    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }
}
