<?php

use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashBoardController::class, 'index'])->name('home');


//feed

Route::get('/feed', [ProfileController::class , 'index']);


//Profile

Route::get('/profile', [ProfileController::class , 'index']);

// Ideas

Route::post('/ideas', [IdeaController::class, 'store'])->name('ideas.store');
Route::get('/ideas/{idea}', [IdeaController::class, 'show'])->name('ideas.show');
Route::get('/ideas/{idea}/edit', [IdeaController::class, 'edit'])->name('ideas.edit');
Route::delete('/ideas/{id}', [IdeaController::class, 'destroy'])->name('ideas.destroy');
Route::put('/ideas/{id}', [IdeaController::class, 'update'])->name('ideas.update');
