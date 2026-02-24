<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('register', [RegisterController::class,'index'])->name('auth.register');
Route::post('register', [RegisterController::class,'register'])->name('auth.register');
Route::get('login', [LoginController::class,'index'])->name('auth.login');
Route::post('login', [LoginController::class,'login'])->name('auth.login');
Route::get('profile', [ProfileController::class,'index'])->name('auth.profile');
Route::put('profile', [ProfileController::class,'update'])->name('auth.profile');
Route::patch('profile', [ProfileController::class,'changePassword'])->name('auth.profile');
