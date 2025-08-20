<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [LoginController::class, 'showRegisterForm']);
Route::post('/register', [LoginController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm']);
Route::post('/login', [LoginController::class, 'login']);

Route::get('/dashboard', [DashController::class, 'index'])->middleware('auth');

Route::get('/posts', [DashController::class, 'showPosts'])->middleware('auth');
Route::post('/posts', [DashController::class, 'storePost'])->middleware('auth');

Route::get('/comments/{postId}', [CommentController::class, 'show'])->middleware('auth');
Route::post('/comments', [CommentController::class, 'store'])->middleware('auth');

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');
