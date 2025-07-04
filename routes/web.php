<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
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
Route::middleware('auth')->group(function () {
    Route::get('/admin', [UserController::class, 'dashboard'])->name('dashboard')/*->middleware('authorize')*/;
    Route::resource('posts', PostController::class);
    Route::patch('posts/{post}/publish', [PostController::class, 'publish'])->name('posts.publish');
    Route::resource('categories', CategoryController::class);
    Route::resource('tags', TagController::class);

});
Route::get('/login',[AuthController::class,'loginForm'])->name('login.form');
Route::post('/login',[AuthController::class,'login'])->name('login');
