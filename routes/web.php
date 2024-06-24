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

Route::get('/login', function () {
    return view('login');
});

Route::get('/test', function () {
    return response()->json(['message' => 'Hello, world!']);
});