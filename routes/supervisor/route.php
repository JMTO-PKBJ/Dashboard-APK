<?php

use App\Http\Controllers\Supervisor\CctvController;
use App\Http\Controllers\Supervisor\EventController;
use Illuminate\Support\Facades\Route;

Route::middleware(['revalidate','auth'])->group(function(){
    Route::middleware(['supervisor'])->group(function(){
        Route::prefix('supervisor')->group(function(){
            Route::get('/dashboard', function () {
                return view('layouts.SUPERVISOR.dashboard'); 
            })->name('supervisor.dashboard');

            Route::group([
                'namespace' => 'App\Http\Controllers\Supervisor',
                'controller' => CctvController::class,
                'prefix' => "cctv",
                'as' => 'supervisor.'
            ], function(){
                Route::get('/', 'showAll')->name('cctv');
                Route::get('/create', 'create')->name('cctv.create');
                Route::post('/store', 'store')->name('cctv.store');
                Route::get('/{id}/show', 'showPage')->name("cctv.show");
                Route::get('/{lokasi}/location', 'showByLocation')->name('cctv.location');
            });
        
            Route::group([
                'namespace' => 'App\Http\Controllers\Supervisor',
                'controller' => EventController::class,
                'as' => 'supervisor.'
            ], function(){
                Route::get('/events', [EventController::class, 'show1'])->name('events');
                Route::get('/getCctvRuas', [EventController::class, 'getCctvRuas'])->name('getCctvRuas');
                Route::get('/getCctvLocations', [EventController::class, 'getCctvLocations'])->name('getCctvLocations');
                Route::get('/getData', [EventController::class, 'getData'])->name('getData');
                Route::get('/export-pdf', [EventController::class, 'exportPDF'])->name('exportPDF');
            });

            Route::group(['prefix' => 'api' , 'as' => 'supervisor.'], function () {
                Route::get('/dashboard-data', [EventController::class, 'getDashboardData'])->name('dashboard.data');
                Route::get('/event-location-data', [EventController::class, 'getEventLocationData'])->name('event.location.data');
                Route::get('/event/class/data', [EventController::class, 'getEventClassData'])->name('event.class.data');
            });
        });
    });
});
