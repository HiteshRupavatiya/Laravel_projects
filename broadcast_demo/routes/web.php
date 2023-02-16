<?php

use App\Http\Controllers\UserController;
use App\Http\Helpers\Custom;
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
    // echo message("Hello"); // Functions based Helper
    // echo Custom::uppercase('hello'); // Class based Helper
    return view('welcome');
});

Route::get('user/{id}', [UserController::class, 'getUser'])->name('user.details');

Route::get('user',[UserController::class,'index'])->name('user.index');

Route::post('uploadImage',[UserController::class,'store'])->name('userImage.upload');
