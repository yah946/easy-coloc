<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ColocationController;
use App\Http\Controllers\InvitationController;
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

    Route::get('colocations', [ColocationController::class,'index'])->name('coloc.index');
    Route::get('colocation/{colocation}', [ColocationController::class,'show'])->name('coloc.show');


    Route::get('invites', [InvitationController::class,'index'])->name('invites');
    Route::post('invitation', [InvitationController::class,'store'])->name('invitation');
    Route::get('invitation/{token}', [InvitationController::class,'store'])->name('invitation');
});
Route::middleware(['admin'])->group(function(){
    Route::get('users', [UserController::class,'index'])->name('admin.users');
    Route::delete('users/{user}', [UserController::class,'ban'])->name('admin.ban');
    Route::get('blocked', [UserController::class,'OnlyBannedUsers'])->name('admin.blocked');
    Route::post('blocked/{user}', [UserController::class,'deban'])->name('admin.deban')->withTrashed();
    Route::get('statistic', [UserController::class,'statistic'])->name('admin.statistic');
});