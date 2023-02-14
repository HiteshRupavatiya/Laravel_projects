<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('login', [UserController::class, 'index'])->name('login');

Route::post('login', [UserController::class, 'login'])->name('login');

Route::get('register', [UserController::class, 'register_view'])->name('register');

Route::post('register', [UserController::class, 'register'])->name('register');

Route::get('home', [UserController::class, 'home'])->name('home');

Route::get('logout', [UserController::class, 'logout'])->name('logout');

Route::get('forgotPassword', [UserController::class, 'showForgotPasswordForm'])->name('forgotPassword');

Route::post('forgotPassword', [UserController::class, 'submitForgot_password'])->name('submitForgotPasswordForm');

Route::get('resetPassword/{token}', [UserController::class, 'showResetPasswordForm'])->name('resetPassword');

Route::post('resetPassword', [UserController::class, 'submitReset_password'])->name('submitResetPasswordForm');

Route::get('varifyUser/{token}',[UserController::class,'verifyUser'])->name('varifyingUser');
