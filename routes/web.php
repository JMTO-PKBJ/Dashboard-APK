<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::redirect('/', '/login');

Route::middleware(['revalidate','auth'])->group(function(){
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

require 'admin/route.php';
require 'operator/route.php';
require 'supervisor/route.php';

// Login
Route::middleware(['redirect'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});