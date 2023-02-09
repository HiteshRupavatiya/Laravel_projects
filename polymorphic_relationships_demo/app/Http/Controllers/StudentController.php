<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function show(){
        return Student::all();
    }

    public function add_student(){
        $student = new Student();
        $student->name = "gaurav";
        $student->city = "gandhinagar";
        $student->save();
    }
}
