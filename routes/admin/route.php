<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\CctvController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Api\UserController;

Route::middleware(['revalidate','auth'])->group(function(){
    Route::middleware(['admin'])->group(function(){
        Route::prefix('admin')->group(function(){

            Route::get('/dashboard', function () {
                return view('layouts.ADMIN.dashboard'); 
            })->name('admin.dashboard');

            // CCTV
            // Route group CCTV
            Route::group([
                'controller' => CctvController::class,
                'prefix' => "cctv",
                'as' => 'admin.'
            ], function(){
                // Route code here ..
                Route::get('/', 'showAll')->name('cctv');
                Route::get('/create', 'create')->name('cctv.create');
                Route::post('/store', 'store')->name('cctv.store');
                Route::get('/{id}/show', 'showPage')->name("cctv.show");
                Route::get('/{lokasi}/location', 'showByLocation')->name('cctv.location');
            });

            Route::group([
                'controller' => UserController::class,
                'as' => 'admin.'
            ], function(){
                // addUser
                Route::get('/users', [UserController::class, 'showAll'])->name('users');
                Route::get('/addUser', [UserController::class, 'showAddUserForm'])->name('addUser');
                Route::post('/register', [UserController::class, 'register'])->name('user.register');
            });
        
            Route::group([
                'controller' => EventController::class,
                'as' => 'admin.'
            ], function(){
                // Event
                Route::get('events', [EventController::class, 'show1'])->name('events');
                Route::get('/getCctvRuas', [EventController::class, 'getCctvRuas'])->name('getCctvRuas');
                Route::get('/getCctvLocations', [EventController::class, 'getCctvLocations'])->name('getCctvLocations');
                Route::get('/getData', [EventController::class, 'getData'])->name('getData');
                Route::get('/export-pdf', [EventController::class, 'exportPDF'])->name('exportPDF');
            });

            // Dashboard
            Route::group(['prefix' => 'api', 'as' => 'admin.'], function () {
                Route::get('/dashboard-data', [EventController::class, 'getDashboardData'])->name('dashboard.data');
                Route::get('/event-location-data', [EventController::class, 'getEventLocationData'])->name('event.location.data');
                Route::get('/event/class/data', [EventController::class, 'getEventClassData'])->name('event.class.data');
            });
        });
    });
});