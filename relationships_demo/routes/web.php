<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DeploymentController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MechanicController;
use App\Http\Controllers\MobileController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SingerController;
use App\Http\Controllers\SongController;
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

Route::get('addAuthor',[AuthorController::class,'add_author']);

Route::get('addPost/{id}',[PostController::class,'add_post']);

Route::get('showPost/{id}',[PostController::class,'show_post']);

Route::get('showAuthor/{id}',[AuthorController::class,'show_author']);

Route::get('addMechanic',[MechanicController::class,'add_mechanic']);

Route::get('addCar/{id}',[CarController::class,'add_car']);

Route::get('addOwner/{id}',[OwnerController::class,'add_owner']);

Route::get('showOwner/{id}',[OwnerController::class,'show_owner']);

Route::get('addProject',[ProjectController::class,'add_project']);

Route::get('addLanguage/{id}',[LanguageController::class,'add_language']);

Route::get('addDeployment/{id}',[DeploymentController::class,'add_deployment']);

Route::get('showDeployment/{id}',[DeploymentController::class,'show_deployment']);

Route::get('addSong',[SongController::class,'add_song']);

Route::get('addSinger',[SingerController::class,'add_singer']);

Route::get('showSong/{id}',[SongController::class,'show_song']);

Route::get('showSinger/{id}',[SingerController::class,'show_singer']);
