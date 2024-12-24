<?php
use Illuminate\Support\Facades\Route;

$routes = [
    '/' => ['user.beranda', 'Beranda', 'beranda'],
    '/daftar' => ['user.register', null, 'daftar'],
    '/login' => ['user.login', null, 'login'],
    '/pengaduan' => ['user.pengaduan', 'Pengaduan', 'pengaduan'],
    '/wisata' => ['user.wisata', 'Wisata', 'wisata'],
    '/laman-berita' => ['user.laman-berita', 'Laman Berita', 'laman-berita'],
    '/berita' => ['user.berita', 'Berita', 'berita'],
    '/prakiraan-cuaca' => ['user.prakiraan-cuaca', 'Prakiraan Cuaca', 'prakiraan-cuaca'],
    '/portal-belanja' => ['user.portal-belanja', 'Portal Belanja', 'portal-belanja'],
    '/belanja' => ['user.belanja', 'Belanja', 'belanja'],
    '/profil' => ['user.profil', 'Profil', 'profil']
];

foreach ($routes as $uri => [$view, $title, $name]) {
    Route::get($uri, function () use ($view, $title) {
        return view($view, $title ? ['title' => $title] : []);
    })->name($name);
}
