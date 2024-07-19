<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CctvController;
use App\Http\Controllers\EventController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\OperatorMiddleware;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\SupervisorMiddleware;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'api'], function () {
    Route::get('/dashboard-data', [EventController::class, 'getDashboardData'])->name('dashboard.data');
    Route::get('/event-location-data', [EventController::class, 'getEventLocationData'])->name('event.location.data');
    Route::get('/event/class/data', [EventController::class, 'getEventClassData'])->name('event.class.data');
});



Route::get('/events', [EventController::class, 'show1']);

Route::get('/getCctvRuas', [EventController::class, 'getCctvRuas'])->name('getCctvRuas');
Route::get('/getCctvLocations', [EventController::class, 'getCctvLocations'])->name('getCctvLocations');
Route::get('/getData', [EventController::class, 'getData'])->name('getData');


Route::get('/register', function () {
    return view('register');
});

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

Route::middleware(['redirect'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware(['auth' ])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard'); // Sesuaikan dengan view dashboard Anda
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('/testlog', function () {
        return view('testlog'); // Sesuaikan dengan view testlog Anda
    });
});

// Route::middleware(['auth', 'operator'])->group(function () {
//     Route::get('/testlog', function () {
//         return view('testlog'); // Sesuaikan dengan view testlog Anda
//     });
// });

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('events/export/excel', [EventController::class, 'exportExcel']);
Route::get('events/export/csv', [EventController::class, 'exportCSV']);
Route::get('events/show', [EventController::class, 'show1']);
Route::get('/events/search', [EventController::class, 'searchByDateRange']);
Route::view('/search', 'search');

// dashboard
Route::get('/events/most-frequent-location', [EventController::class, 'getMostFrequentEventLocation']);
Route::view('/search-frequent-location', 'search_frequent_location');

// Route::get('/dashboard', [EventController::class, 'getDashboardData']);


// Route to display the users list page
Route::get('/show-users', [UserController::class, 'showAll'])->name('show.users');
// Route to download users CSV
Route::get('users/export/csv', [UserController::class, 'exportUsersCsv'])->name('users.export.csv');





// Im code here

// Route group CCTV
Route::group([
        'namespace' => 'App\Http\Controllers',
        'controller' => CctvController::class,
        'prefix' => "cctv",
        'as' => 'cctv'
    ], function(){
    // Route code here ..
    Route::get('/', 'showAll');
    Route::get('/create', 'showAdd')->name('.create');
    Route::post('/store', 'store');
    Route::get('/{id}/show', 'showPage')->name(".show");
    Route::get('/{lokasi}/location', 'showByLocation')->name('.location');
});