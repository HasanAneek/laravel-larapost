<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PostController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\LikeController;
use \App\Http\Controllers\UserPostController;

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

Route::get('/', function() {
    return view('home');
})->name('home');

Route::get('/dashboard', [PostController::class,'index'])->name('dashboard');
Route::get('/posts/create',[PostController::class,'create'])->middleware('auth');
Route::post('/posts',[PostController::class,'store'])->middleware('auth');
Route::get('/posts/{post}',[PostController::class,'show']);
Route::delete('/posts/{post}',[PostController::class,'destroy'])->middleware('auth');
Route::get('/posts/{post}/edit',[PostController::class,'edit'])->middleware('auth');
Route::put('/posts/{post}',[PostController::class,'update'])->middleware('auth');

//Route::get('/users/{user:name}/posts',[UserPostController::class,'index'])->name('users.posts');
Route::get('/users/{user:username}/posts', [UserPostController::class, 'index'])->name('users.posts');

Route::get('/register',[UserController::class,'create'])->middleware('guest');
Route::post('/users',[UserController::class,'store']);
Route::get('/login',[UserController::class,'login'])->name('login')->middleware('guest');
Route::post('/users/authenticate',[UserController::class,'authenticate']);
Route::post('/logout',[UserController::class,'destroy'])->middleware('auth');


Route::post('/posts/{post}/likes',[LikeController::class,'store'])->name('posts.likes')->middleware('auth');
Route::delete('/posts/{post}/likes',[LikeController::class,'destroy']);
