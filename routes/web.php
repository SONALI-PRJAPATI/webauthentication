<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


// Define the home route
Route::get('/', [AuthController::class, 'Showlogin'])->name('login');
Route::post('/', [AuthController::class, 'login'])->name('login.submit');

// Define the register route
Route::get('/register', [AuthController::class, 'showregistration'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::middleware('auth')->get('/profile', [AuthController::class, 'profile'])->name('profile');
//edit
Route::get('/edit', [AuthController::class, 'edit'])->name('edit');
Route::put('/update', [AuthController::class, 'update'])->name('update');


Route::get('/reset',[AuthController::class,'reset'])->name('reset');
Route::post('/reset', [AuthController::class, 'handleReset'])->name('reset.submit');



