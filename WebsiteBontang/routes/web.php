<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;

use App\Http\Controllers\FacebookController;
use App\Http\Controllers\LamanBeritaController;
use App\Http\Controllers\PariwisataController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\WisataController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarouselController;

// Route 1: Beranda
Route::get('/', [CarouselController::class, 'index'])->name(name: 'beranda');

// Route 2: Daftar
Route::get('/daftar', [AuthController::class,'showDaftar'])->name('daftar.tampil');
Route::post('/daftar/submit', [AuthController::class,'submitDaftar'])->name('daftar.submit');

// Route 3: Login
Route::get('/login', [AuthController::class,'showLogin'])->name('login.tampil');
Route::post('/login/submit', [AuthController::class,'submitLogin'])->name('login.submit');
Route::post('/logout', [AuthController::class,'logout'])->name('logout');


// Route 4: Pengaduan
Route::get('/pengaduan',[PengaduanController::class,'showPengaduan'])->name('pengaduan.tampil');
Route::post('/pengaduan/submit',[PengaduanController::class,'submitPengaduan'])->name('pengaduan.submit');

// Route 5: Wisata
Route::get('/wisata/{slug}', [WisataController::class,'index'])
->name('wisata');
Route::get('/pariwisata', [PariwisataController::class,'index'])
->name('pariwisata');

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

Route::get('auth/facebook',[FacebookController::class,'facebookpage'])->name('facebook.auth');
Route::get('auth/facebook/callback',[FacebookController::class,'facebookredirect'])->name('facebook.callback');