<?php

use App\Http\Controllers\TamuController;
use Illuminate\Support\Facades\Route;

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

// Index tamu route
Route::get('/tamu', [TamuController::class, 'index'])->name('index');

// Show Create tamu route
Route::get('/tamu/baru', [TamuController::class, 'create'])->name('create');

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

