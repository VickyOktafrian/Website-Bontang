<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\BelanjaController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PariwisataController;
use App\Http\Controllers\LamanBeritaController;
use App\Http\Controllers\PortalBelanjaController;

// Route 1: Beranda (Homepage)
Route::get('/', [CarouselController::class, 'index'])->name('beranda');

// Route 2: Daftar
Route::get('/daftar', [AuthController::class, 'showDaftar'])->name('daftar.tampil');
Route::post('/daftar/submit', [AuthController::class, 'submitDaftar'])->name('daftar.submit');

// Route 3: Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login.tampil');
Route::post('/login/submit', [AuthController::class, 'submitLogin'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route 4: Pengaduan
Route::get('/pengaduan', [PengaduanController::class, 'showPengaduan'])->name('pengaduan.tampil');
Route::post('/pengaduan/submit', [PengaduanController::class, 'submitPengaduan'])->name('pengaduan.submit');

// Route 5: Wisata dan Pariwisata
Route::get('/wisata/{slug}', [WisataController::class, 'index'])->name('wisata');
Route::get('/pariwisata', [PariwisataController::class, 'index'])->name('pariwisata');

// Route 6: Laman Berita
Route::get('/laman-berita', [LamanBeritaController::class, 'index'])->name('laman-berita');

// Route 7: Berita
Route::get('/laman-berita/{slug}', [BeritaController::class, 'index'])->name('berita');

// Route 8: Prakiraan Cuaca
Route::get('/prakiraan-cuaca', [WeatherController::class, 'index'])->name('prakiraan-cuaca');

// Route 9: Portal Belanja
Route::get('/portal-belanja', [PortalBelanjaController::class, 'index'])->name('portal-belanja');

// Route 10: Belanja
Route::get('/portal-belanja/{slug}', [BelanjaController::class, 'index'])->name('belanja');

// Route 11: Profil
Route::get('/profil', [ProfilController::class, 'show'])->name('profil.edit');
Route::put('/profil/update', [ProfilController::class, 'update'])->name('profil.update');

// Route Autentikasi dengan Facebook dan Google
Route::get('auth/facebook', [FacebookController::class, 'facebookpage'])->name('facebook.auth');
Route::get('auth/facebook/callback', [FacebookController::class, 'facebookredirect'])->name('facebook.callback');
Route::get('auth/google', [GoogleController::class, 'googlepage'])->name('google.auth');
Route::get('auth/google/callback', [GoogleController::class, 'googleredirect'])->name('google.callback');

// Route Keranjang Belanja (Cart)
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{barang}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{barang}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{barang}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

// Route Pemesanan (Checkout)
Route::get('/checkout', [OrderController::class, 'checkout'])->name('order.checkout');
Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');
Route::get('/order/success/{id}', [OrderController::class, 'success'])->name('order.success');
Route::get('/orderan', [OrderController::class, 'listorderan'])->name('orderan');
Route::put('/orders/{id}/update-status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
