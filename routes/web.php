<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin', function () {
    return view('admin.index');
});

Route::get('/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');

Route::prefix('admin')->group(function () {
 Route::get('/login',[LoginController::class,'index'])->name('admin.login.page');
 Route::post('/login',[LoginController::class,'login'])->name('admin.login');
});