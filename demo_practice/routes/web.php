<?php

use App\Http\Controllers\StudentController;
use App\PaymentService\PaymentServiceInterface;
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

Route::get('/payment', function (PaymentServiceInterface $payment) {
    return $payment->checkout();
});

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/greetings', function () {
//     return "Hello World!";
// });

// Route::get('/user/{name?}/id/{id?}', function ($name = null, $id = null) {
//     echo $name . " " . $id;
// })->where(['id' => '[0-9]+', 'name' => '[a-zA-Z]+']);

// Route::view('/welcome', "welcome"); // Displays an welcome view

// Route::get('/profile/id', function () {
//     return "<h1>User Profile</h1>";
// })->name('profile');

Route::group(['middleware' => 'throttle:10,1','prefix' => 'users'],function(){
    Route::get('/home',function(){
        return "Home Page";
    })->name('home');
    Route::get('/adduser/{userName?}/{password?}',function($username,$password){
        return "Hello $username";
    })->name('adduser')->where(['username' => '[a-zA-Z]+','password' => '[a-zA-Z0-9]+']);
    Route::get('/contactUs',function(){
        return "Contact Us Page";
    })->name('contact');
    Route::get('/aboutUs',function(){
        return "About Us Page";
    })->name('aboutUs');
});

Route::group(['middleware' => 'throttle:10,1'],function(){
    Route::resource('students',StudentController::class);
});

