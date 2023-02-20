<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\PostController;
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

Route::get('user', [UserController::class, 'index'])->name('user.index');

Route::post('uploadImage', [UserController::class, 'store'])->name('userImage.upload');

Route::get('downloadImage/{path}', [UserController::class, 'download_image'])->name('userImage.download');

Route::post('deleteImage/{path}', [UserController::class, 'delete_image'])->name('userImage.delete');

Route::get('fileOperations', [UserController::class,'fileOperations'])->name('fileOperations');

Route::get('getUserPhone/{id}',[UserController::class,'getUserPhone'])->name('user.phone');

Route::get('getUser/{id}',[PhoneController::class,'getUser'])->name('phone.user');

Route::get('getComments/{id}',[PostController::class,'getPostComments'])->name('post.comment');

Route::get('getPost/{id}',[CommentController::class,'getPostFromComments'])->name('comment.post');
