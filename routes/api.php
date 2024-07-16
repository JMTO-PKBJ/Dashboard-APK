<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CctvController;
use App\Http\Controllers\EventController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware(Authenticate::using('sanctum'));

// Public routes
Route::post('/login', [UserController::class, 'login']);
Route::post('/refresh', [UserController::class, 'refreshToken']);
Route::post('/register', [UserController::class, 'register']);

// Protected routes
Route::middleware(['auth:api'])->group(function () {
    Route::middleware([AdminMiddleware::class])->group(function () {
        Route::get('/users', [UserController::class, 'index']);
        Route::put('/users/{id}', [UserController::class, 'update']);
        
    });
    Route::post('/logout', [UserController::class, 'logout']);
});

Route::apiResource('/cctv', CctvController::class);
// Route::get('/cctvs', [CctvController::class, 'index']);
// Route::post('/cctvs', [CctvController::class, 'store']);
// Route::get('/cctvs/{id}', [CctvController::class, 'show']);
// Route::put('/cctvs/{id}', [CctvController::class, 'update']);
// Route::delete('/cctvs/{id}', [CctvController::class, 'destroy']);
// Route::get('/cctvs/location/{lokasi}', [CctvController::class, 'showByLocation']);
Route::get('cctv', [CctvController::class, 'index']);
Route::post('cctv', [CctvController::class, 'store']);
Route::get('cctv/{id}', [CctvController::class, 'show']);
Route::put('cctv/{id}', [CctvController::class, 'update']);
Route::delete('cctv/{id}', [CctvController::class, 'destroy']);
Route::get('cctv/location/{lokasi}', [CctvController::class, 'showByLocation']);

// Route::post('/cctv', CctvController::class, 'store');
// Route::get('/cctv/{lokasi}', [CctvController::class, 'showByLocation'])->name('cctv.showByLocation');


// Route::apiResource('/events', CctvController::class);
Route::get('/events', [EventController::class, 'index']);
// Route::get('/events/{event_id}', [EventController::class, 'show']);
Route::get('/events/{event_id}', [EventController::class, 'show']);
Route::post('/events', [EventController::class, 'store']);
Route::put('/events/{id}', [EventController::class, 'update']);
Route::delete('/events/{event_id}', [EventController::class, 'destroy']);
// Route::get('events/export/csv', [EventController::class, 'exportCSV']);
Route::get('events/export/csv', [EventController::class, 'exportCSV']);
Route::get('events/show', [EventController::class, 'showEvents']);
Route::get('/events/search', [EventController::class, 'searchByDateRange']);




