<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Mobile;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function add_customer(){
        $mobile = new Mobile();
        $mobile->model = "LG101";
        
        $customer = new Customer();
        $customer->name = "amit";
        $customer->email = "amit@gmail.com";
        $customer->save();

        $customer->mobile()->save($mobile);

    }

    public function show_customer($id){
        $mobile = Customer::find($id)->mobile;
        return $mobile;
    }
}
