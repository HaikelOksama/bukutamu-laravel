<?php

use App\Http\Controllers\TamuController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Index tamu route
Route::get('/tamu', [TamuController::class, 'index'])->name('index')->middleware('auth');

// Show Create tamu route
Route::get('/tamu/baru', [TamuController::class, 'create'])->name('create')->middleware('auth');

// Store tamu route
Route::post('/tamu', [TamuController::class, 'store'])->name('store-tamu')->middleware('auth');

// Show Tamu route
Route::get('/tamu/{tamu}', [TamuController::class,'show'])->name('detail')->middleware('auth');

// Show Edit tamu route
Route::get('/tamu/{tamu}/edit', [TamuController::class, 'edit'])->name('edit')->middleware('auth');

// Edit Submit tamu route
Route::put('/tamu/{tamu}', [TamuController::class, 'update'])->name('update')->middleware('auth');

// Destroy tamu route
Route::delete('/tamu/{tamu}', [TamuController::class, 'destroy'])->name('destroy')->middleware('auth');

// Report page
Route::get('/report', [TamuController::class, 'laporan'])->name('report')->middleware('auth');

// Statistic Page
Route::get('/statistic', [TamuController::class, 'statistic'])->name('statistic')->middleware('auth');

Route::get('/', function () {
    return view('welcome');
});

// Show tamu list by user
Route::get('/user/{id}/tamu', [TamuController::class, 'listUser'])->name('listUser')->middleware('auth');

// Show Register route
Route::get('/register', [UserController::class, 'create'])->name('auth.register')->middleware('guest');

// Store new user route
Route::post('/users', [UserController::class,'store'])->name('auth.store')->middleware('guest');

// Logout the user 
Route::post('/logout', [UserController::class, 'logout'])->name('auth.logout')->middleware('auth');

// Show Login route
Route::get('/login', [UserController::class,'login'])->name('auth.login')->middleware('guest');

// Authenticate user route
Route::post('/authenticate', [UserController::class, 'authenticate'])->name('auth.authenticate')->middleware('guest');
