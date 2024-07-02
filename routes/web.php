<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/viewCCTV', function () {
    return view('viewCCTV');
});

Route::get('/addCCTV', function () {
    return view('addCCTV');
});

Route::get('/event', function () {
    return view('event');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/users', function () {
    return view('users');
});

Route::get('/addUser', function () {
    return view('addUser');
});

Route::get('/test', function () {
    return response()->json(['message' => 'Hello, world!']);
});