<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request){
        // dd($request);
        // dd($request->path());
        // dd($request->url());
        // dd($request->fullUrl());
        // dd($request->method());
        
        // if($request->isMethod('GET')){
        //     dd('yes it is get method');
        // }
        // else{
        //     dd('no it is post method');
        // }
        
        // dd($request->header());
        // dd($request->header('X-Header-Name','default'));
        if($request->hasHeader('X-Header-Name')){
            dd('Header Present');
        }

        // dd($request->bearerToken());
        // dd($request->ip());
        // dd($request->getAcceptableContentTypes());
        if($request->accepts('text/html')){
            dd('yes');
        }

        return view('employeeIndex');
    }
}
