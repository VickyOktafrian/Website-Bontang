<?php
use App\Http\Controllers\BeritaController;

use App\Http\Controllers\LamanBeritaController;
use App\Http\Controllers\WisataController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarouselController;

// Route 1: Beranda
Route::get('/', [CarouselController::class, 'index'])->name(name: 'beranda');

// Route 2: Daftar
Route::get('/daftar', function () {
    return view('user.register');
})->name('daftar');

// Route 3: Login
Route::get('/login', function () {
    return view('user.login');
})->name('login');

// Route 4: Pengaduan
Route::get('/pengaduan', function () {
    return view('user.pengaduan', ['title' => 'Pengaduan']);
})->name('pengaduan');

// Route 5: Wisata
Route::get('/wisata/{slug}', [WisataController::class,'index'])
->name('wisata');

// Route 6: Laman Berita
Route::get('/laman-berita', [LamanBeritaController::class,'index'])
->name('laman-berita');

// Route 7: Berita
Route::get('/laman-berita/{slug}', [BeritaController::class,'index'])
->name('berita');

// Route 8: Prakiraan Cuaca
Route::get('/prakiraan-cuaca', function () {
    return view('user.prakiraan-cuaca', ['title' => 'Prakiraan Cuaca']);
})->name('prakiraan-cuaca');

// Route 9: Portal Belanja
Route::get('/portal-belanja', function () {
    return view('user.portal-belanja', ['title' => 'Portal Belanja']);
})->name('portal-belanja');

// Route 10: Belanja
Route::get('/belanja', function () {
    return view('user.belanja', ['title' => 'Belanja']);
})->name('belanja');

// Route 11: Profil
Route::get('/profil', function () {
    return view('user.profil', ['title' => 'Profil']);
})->name('profil');
