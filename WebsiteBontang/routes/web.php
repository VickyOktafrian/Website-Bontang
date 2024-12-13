<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/daftar', function () {
    return view('register');
});
Route::get('/login', action: function () {
    return view('login');
});
Route::get('/pengaduan', action: function () {
    return view('pengaduan');
});