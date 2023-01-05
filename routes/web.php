<?php

use App\Http\Controllers\TamuController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Index tamu route
Route::get('/tamu', [TamuController::class, 'index'])->name('index');

// Show Create tamu route
Route::get('/tamu/baru', [TamuController::class, 'create'])->name('create')->middleware('auth');

// Store tamu route
Route::post('/tamu', [TamuController::class, 'store'])->name('store-tamu');

// Show Tamu route
Route::get('/tamu/{tamu}', [TamuController::class,'show'])->name('detail');

// Show Edit tamu route
Route::get('/tamu/{tamu}/edit', [TamuController::class, 'edit'])->name('edit');

// Edit Submit tamu route
Route::put('/tamu/{tamu}', [TamuController::class, 'update'])->name('update');

// Destroy tamu route
Route::delete('/tamu/{tamu}', [TamuController::class, 'destroy'])->name('destroy');

Route::get('/', function () {
    return view('welcome');
});

// Show Register route
Route::get('/register', [UserController::class, 'create'])->name('auth.register');

// Store new user route
Route::post('/users', [UserController::class,'store'])->name('auth.store');

// Logout the user 
Route::post('/logout', [UserController::class, 'logout'])->name('auth.logout');

// Show Login route
Route::get('/login', [UserController::class,'login'])->name('auth.login');

// Authenticate user route
Route::post('/authenticate', [UserController::class, 'authenticate'])->name('auth.authenticate');
