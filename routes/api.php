<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware(Authenticate::using('sanctum'));

// //posts
// // Route::apiResource('/posts', App\Http\Controllers\Api\PostController::class);
// // Route::post('/addusers', [UserController::class, 'store']);
// Route::get('/showusers', [UserController::class, 'index']);

// Route::post('/register', [UserController::class, 'register']);
// Route::post('/login', [UserController::class, 'login']);
// Route::middleware('auth:api')->group(function () {
//     Route::get('/users', [UserController::class, 'index']);
//     // Route::post('/users', [UserController::class, 'store']);
// });


// Route::middleware('auth:api')->group(function () {
//     Route::get('/users', [UserController::class, 'index']);
//     Route::post('/login', [UserController::class, 'login']);

//     Route::middleware('admin')->group(function () {
//         Route::post('/register', [UserController::class, 'register']);
//         Route::put('/users/{id}', [UserController::class, 'update']);
//         Route::delete('/users/{id}', [UserController::class, 'destroy']);
//     });
// });

// Public routes

Route::post('/login', [UserController::class, 'login']);

// // Protected routes
// Route::middleware('auth:api')->group(function () {
//     Route::get('/users', [UserController::class, 'index']);
//     Route::put('/users/{id}', [UserController::class, 'update']);
//     Route::delete('/users/{id}', [UserController::class, 'destroy']);
// });

// Protected routes
Route::middleware(['auth:api', AdminMiddleware::class])->group(function () {
    Route::post('/register', [UserController::class, 'register']);
    Route::get('/users', [UserController::class, 'index']);
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);
});













