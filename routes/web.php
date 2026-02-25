<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ColocationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware('guest')->group(function(){
    Route::get('register', [RegisterController::class,'index'])->name('register');
    Route::post('register', [RegisterController::class,'register'])->name('register');
    Route::get('login', [LoginController::class,'index'])->name('login');
    Route::post('login', [LoginController::class,'login'])->name('login');
});
Route::middleware(['auth'])->group(function(){
    Route::get('profile', [ProfileController::class,'index'])->name('auth.profile');
    Route::put('profile', [ProfileController::class,'update'])->name('auth.profile');
    Route::patch('profile', [ProfileController::class,'changePassword'])->name('auth.profile');
    Route::get('logout', LogoutController::class)->name('logout');

    Route::get('colocations', [ColocationController::class,'index'])->name('auth.profile');
    Route::get('colocation', [ColocationController::class,'show'])->name('auth.profile');
});