<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\FollowUserController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashBoardController::class, 'index'])->name('home');


//feed

Route::get('/feed', [ProfileController::class , 'index']);


//Profile

Route::get('/profile', [UserController::class , 'profile'])->name('profile')->middleware('auth');


Route::resource('ideas', IdeaController::class)->except(['index','show'])->middleware('auth');

Route::resource('ideas', IdeaController::class)->only(['index','show']);

//Comments

Route::post('/ideas/{idea}/comment', [CommentController::class, 'store'])->name('idea.comment.store');

//User

Route::resource('users', UserController::class)->only(['show','edit','update'])->middleware('auth');

//Follow & Unfollow

Route::post('/users/{user}/follow',[FollowUserController::class, 'follow'])->name('users.follow')->middleware('auth');
Route::post('/users/{user}/unfollow',[FollowUserController::class, 'unfollow'])->name('users.unfollow')->middleware('auth');
//Authentication

Route::get('/register', [AuthController::class , 'register'])->name('register');

Route::post('/register', [AuthController::class , 'store'])->name('register.store');

Route::get('/login', [AuthController::class , 'login'])->name('login');

Route::post('/login', [AuthController::class , 'authenticate'])->name('login.authenticate');

Route::post('/logout', [AuthController::class , 'logout'])->name('logout');
