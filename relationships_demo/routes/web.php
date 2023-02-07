<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MobileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('addCustomers',[CustomerController::class,'add_customer']);

Route::get('showMobile/{id}',[CustomerController::class,'show_customer']);

Route::get('showCustomer/{id}',[MobileController::class,'show_customer']);
