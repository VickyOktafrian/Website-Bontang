<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('beranda');
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
Route::get('/wisata', action: function () {
    return view('wisata');
});
Route::get('/laman-berita', action: function () {
    return view('laman-berita');
});
Route::get('/berita', action: function () {
    return view('berita');
});
Route::get('/wisata', action: function () {
    return view('wisata');
});
Route::get('/prakiraan-cuaca', action: function () {
    return view('prakiraan-cuaca');
});
Route::get('/portal-belanja', action: function () {
    return view('portal-belanja');
});