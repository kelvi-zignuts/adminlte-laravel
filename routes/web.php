<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin', function () {
    return view('admin.index');
});

Route::prefix('admin')->group(function () {
 Route::get('/login',[LoginController::class,'index'])->name('admin.login.page');
 Route::post('/login',[LoginController::class,'login'])->name('admin.login');

});