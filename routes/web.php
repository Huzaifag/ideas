<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\FollowUserController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\AdminDashboardController;
use Illuminate\Support\Facades\Gate;

Route::middleware(['setLocal'])->group(function () {
Route::get('lang/{lang}', function($lang){
    session()->put('lang', $lang);
    return redirect()->route('home');
})->name('switch.lang');

Route::get('/', [DashBoardController::class, 'index'])->name('home');


//feed

Route::get('/feed', FeedController::class)->middleware('auth')->name('feed');


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

//like & unlike
Route::post('/ideas/{idea}/like',[LikesController::class, 'like'])->name('ideas.like')->middleware('auth');
Route::post('/ideas/{idea}/unlike',[LikesController::class, 'unlike'])->name('ideas.unlike')->middleware('auth');
//Authentication

Route::group(['middleware' => 'guest'], function(){
    Route::get('/register', [AuthController::class , 'register'])->name('register');
    Route::get('/login', [AuthController::class , 'login'])->name('login');
    Route::post('/login', [AuthController::class , 'authenticate'])->name('login.authenticate');
    Route::post('/register', [AuthController::class , 'store'])->name('register.store');
});

Route::post('/logout', [AuthController::class , 'logout'])->middleware('auth')->name('logout');


Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard')->middleware(['auth', 'admin']);

Route::get('checksGate', function(){
  // if(!Gate::allows('admin')){
  //   abort(403);
  // }

  // if(Gate::denies('admin')){
  //   abort(403);
  // }

Gate::authorize('admin');

  return('Hello');
});
});
