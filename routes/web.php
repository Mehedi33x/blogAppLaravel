<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('sign-up',[AuthController::class, 'signup'])->name('auth.signup');
Route::post('do-signup',[AuthController::class, 'doSignup'])->name('do.signup');

Route::get('sign-in',[AuthController::class, 'signin'])->name('auth.signin');
Route::post('do-sign-in',[AuthController::class, 'doSignin'])->name('do.signin');
Route::get('logout',[AuthController::class, 'logout'])->name('auth.logout');
Route::get('/',[PostController::class,'home'])->name('home.page');
Route::get('post-create',[PostController::class,'create'])->name('post.create');
Route::post('do-create',[PostController::class,'doCreate'])->name('post.doCreate');
Route::get('post-details/{id}',[PostController::class,'postDetails'])->name('post.details');

Route::post('comment/{id}',[PostController::class,'comment'])->name('post.comment');



// social login
Route::get('auth/google', [AuthController::class, 'googlePage'])->name('auth.google');
Route::get('auth/google/callback', [AuthController::class, 'handleGoogleCallback']);

