<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\User\UserDashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin', function () {
    return view('admin.index');
});

Route::get('/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');
Route::get('user/dashboard',[UserDashboardController::class,'index'])->name('user.dashboard');


Route::prefix('admin')->group(function () {
 Route::get('/login',[LoginController::class,'index'])->name('admin.login.page');
 Route::post('/login',[LoginController::class,'login'])->name('admin.login');
});

// Route::prefix('user')->group(function () {
//     Route::post('/login',[LoginController::class,'login'])->name('user.login');
//    });