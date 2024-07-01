<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\User\UserDashboardController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('admin', function () {
//     return view('admin.index');
// });

Route::get('user/dashboard',[UserDashboardController::class,'index'])->name('user.dashboard');


    // Route::get('/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');
    Route::get('/logout',[DashboardController::class,'logout'])->name('admin.logout');


Route::prefix('admin')->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');
    // Route::get('/login',[LoginController::class,'index'])->name('admin.login.page');
    // Route::post('/login',[LoginController::class,'login'])->name('admin.login');
    Route::get("/login",[LoginController::class,'otpSend'])->name('admin.login.page');
    Route::post('/login',[LoginController::class,'verifyOtp'])->name('admin.login');
});

// Route::prefix('user')->group(function () {
//     Route::post('/login',[LoginController::class,'login'])->name('user.login');
//    });
Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    Route::get('/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/{user}/update', [UserController::class, 'update'])->name('users.update');
    Route::delete('/{user}/delete', [UserController::class, 'destroy'])->name('users.destroy');
});

// Route::get("/mobile-verification",[LoginController::class,'otpSend'])->name('admin.otp');
// Route::get('/verify-otp', [LoginController::class, 'showVerifyOtpForm'])->name('verify.otp');

// Route::get('/verify', [LoginController::class, 'verifyOtp'])->name('admin.verifyOtp');

// Route::get('/verify-otp', [LoginController::class, 'verifyOtp'])->name('admin.verify-otp');

