<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware(Authenticate::using('sanctum'));

//posts
// Route::apiResource('/posts', App\Http\Controllers\Api\PostController::class);
// Route::post('/addusers', [UserController::class, 'store']);
Route::get('/showusers', [UserController::class, 'index']);

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::middleware('auth:api')->group(function () {
    Route::get('/users', [UserController::class, 'index']);
    // Route::post('/users', [UserController::class, 'store']);
});













