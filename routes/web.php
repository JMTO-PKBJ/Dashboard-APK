<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
});


Route::get('/event', function () {
    return view('event');
});

Route::get('/test', function () {
    return response()->json(['message' => 'Hello, world!']);
});