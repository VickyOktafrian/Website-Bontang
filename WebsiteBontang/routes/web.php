<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.beranda' ,['title'=>'Beranda']);
});
Route::get('/daftar', function () {
    return view('user.register');
});
Route::get('/login', action: function () {
    return view('user.login');
});
Route::get('/pengaduan', action: function () {
    return view('user.pengaduan', ['title'=>'Pengaduan']);
});
Route::get('/wisata', action: function () {
    return view('user.wisata', ['title'=>'Wisata']);
});
Route::get('/laman-berita', action: function () {
    return view('user.laman-berita', ['title'=>'Laman Berita']);
});
Route::get('/berita', action: function () {
    return view('user.berita', ['title'=>'Berita']);
});
Route::get('/prakiraan-cuaca', action: function () {
    return view('user.prakiraan-cuaca', ['title'=>'Prakiraan Cuaca']);
});
Route::get('/portal-belanja', action: function () {
    return view('user.portal-belanja', ['title'=>'Portal Belanja']);
});
Route::get('/belanja', action: function () {
    return view('user.belanja', ['title'=>'Belanja']);
});
Route::get('/profil', action: function () {
    return view('user.profil', ['title'=>'Profil']);
});