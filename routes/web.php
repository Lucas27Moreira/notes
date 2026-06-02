<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckIsLogged;
use App\Http\Middleware\CheckIsNotLogeed;

// Auth routes
Route::middleware([CheckIsNotLogeed::class])->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/loginSubmit', [AuthController::class, 'loginSubmit'])->name('loginSubmit');
});





// app routes
Route::middleware([CheckIsLogged::class])->group(function () {
    // Main routes
    Route::get('/', [MainController::class, 'index'])->name('home');
    Route::get('/new-note', [MainController::class, 'newNote'])->name('newNote');
    Route::post('/newNoteSubmit', [MainController::class, 'newNoteSubmit'])->name('newNoteSubmit');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/edit-note/{id}', [MainController::class, 'editNote'])->name('editNote');
    Route::get('/delete-note/{id}', [MainController::class, 'deleteNote'])->name('deleteNote');

});
