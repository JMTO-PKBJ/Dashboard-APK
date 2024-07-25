<?php

use App\Http\Controllers\Operator\CctvController;
use App\Http\Controllers\Operator\EventController;
use Illuminate\Support\Facades\Route;

Route::middleware(['revalidate','auth'])->group(function(){
    Route::middleware(['operator'])->group(function(){
        Route::prefix('operator')->group(function(){
            Route::get('/dashboard', function () {
                return view('layouts.operator.dashboard'); 
            })->name('operator.dashboard');

            Route::group([
                'namespace' => 'App\Http\Controllers\Operator',
                'controller' => CctvController::class,
                'prefix' => "cctv",
                'as' => 'operator.'
            ], function(){
                Route::get('/', 'showAll')->name('cctv');
            });
        
            Route::group([
                'namespace' => 'App\Http\Controllers\Operator',
                'controller' => EventController::class,
                'as' => 'operator.'
            ], function(){
                Route::get('events', [EventController::class, 'show1'])->name('events');
                Route::get('/getCctvRuas', [EventController::class, 'getCctvRuas'])->name('getCctvRuas');
                Route::get('/getCctvLocations', [EventController::class, 'getCctvLocations'])->name('getCctvLocations');
                Route::get('/getData', [EventController::class, 'getData'])->name('getData');
                Route::get('/export-pdf', [EventController::class, 'exportPDF'])->name('exportPDF');
            });

            Route::group(['prefix' => 'api', 'as' => 'operator.'], function () {
                Route::get('/dashboard-data', [EventController::class, 'getDashboardData'])->name('dashboard.data');
                Route::get('/event-location-data', [EventController::class, 'getEventLocationData'])->name('event.location.data');
                Route::get('/event/class/data', [EventController::class, 'getEventClassData'])->name('event.class.data');
            });
        });
    });
});