<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.beranda', ['title' => 'Beranda']);
})->name('beranda'); // Named route for Beranda

Route::get('/daftar', function () {
    return view('user.register');
})->name('daftar'); // Named route for Daftar

Route::get('/login', function () {
    return view('user.login');
})->name('login'); // Named route for Login

Route::get('/pengaduan', function () {
    return view('user.pengaduan', ['title' => 'Pengaduan']);
})->name('pengaduan'); // Named route for Pengaduan

Route::get('/wisata', function () {
    return view('user.wisata', ['title' => 'Wisata']);
})->name('wisata'); // Named route for Wisata

Route::get('/laman-berita', function () {
    return view('user.laman-berita', ['title' => 'Laman Berita']);
})->name('laman-berita'); // Named route for Laman Berita

Route::get('/berita', function () {
    return view('user.berita', ['title' => 'Berita']);
})->name('berita'); // Named route for Berita

Route::get('/prakiraan-cuaca', function () {
    return view('user.prakiraan-cuaca', ['title' => 'Prakiraan Cuaca']);
})->name('prakiraan-cuaca'); // Named route for Prakiraan Cuaca

Route::get('/portal-belanja', function () {
    return view('user.portal-belanja', ['title' => 'Portal Belanja']);
})->name('portal-belanja'); // Named route for Portal Belanja

Route::get('/belanja', function () {
    return view('user.belanja', ['title' => 'Belanja']);
})->name('belanja'); // Named route for Belanja

Route::get('/profil', function () {
    return view('user.profil', ['title' => 'Profil']);
})->name('profil'); // Named route for Profil
