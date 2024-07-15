<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CctvController;
use App\Http\Controllers\EventController;
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/viewCCTV', [CctvController::class, 'showAll']);

// Route::get('/addCCTV', [CctvController::class, 'showAll']);


Route::get('/addCCTV', function () {
    return view('addCCTV');
});

Route::get('/events', function () {
    return view('events');
});

Route::get('/register', function () {
    return view('register');
});

// Route::get('/login', function () {
//     return view('login');
// });

Route::get('/users', function () {
    return view('users');
});

Route::get('/addUser', function () {
    return view('addUser');
});

Route::get('/test', function () {
    return view('test');
    // return response()->json(['message' => 'Hello, world!']);
});

// Route untuk halaman login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Route untuk logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route untuk halaman home, dilindungi oleh middleware auth
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

// Redirect ke home jika root diakses dan user sudah login
Route::get('/', function () {
    return redirect()->route('home');
})->middleware('auth');

// Jika user belum login, arahkan ke halaman login
Route::get('/', function () {
    return redirect()->route('login');
})->middleware('guest');

// Route::get('/cctv/{id}', [CctvController::class, 'showPage'])->name('cctv.showPage');
// Route::get('/cctv/{lokasi}', [CctvController::class, 'showByLocation'])->name('cctv.showByLocation');
Route::get('cctv/{id}/show', [App\Http\Controllers\CctvController::class, 'showPage']);
// Route::get('cctv/all', [App\Http\Controllers\CctvController::class, 'showAll']);


Route::get('cctv/all', [CctvController::class, 'showAll']);



Route::get('events/show', [EventController::class, 'show1']);
