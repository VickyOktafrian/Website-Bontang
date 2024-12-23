<?php

use Diglactic\Breadcrumbs\Breadcrumbs;


// Daftar (Register)
Breadcrumbs::for('daftar', function ($trail) {
    $trail->parent('beranda'); // Parent-nya adalah Beranda
    $trail->push('Daftar', route('daftar'));
});

// Login
Breadcrumbs::for('login', function ($trail) {
    $trail->parent('beranda'); // Parent-nya adalah Beranda
    $trail->push('Login', route('login'));
});

// Pengaduan
Breadcrumbs::for('pengaduan', function ($trail) {
    $trail->parent('beranda'); // Parent-nya adalah Beranda
    $trail->push('Pengaduan', route('pengaduan'));
});

// Wisata
Breadcrumbs::for('wisata', function ($trail) {
    $trail->parent('beranda'); // Parent-nya adalah Beranda
    $trail->push('Wisata', route('wisata'));
});

// Laman Berita
Breadcrumbs::for('laman-berita', function ($trail) {
    $trail->parent('beranda'); // Parent-nya adalah Beranda
    $trail->push('Laman Berita', route('laman-berita'));
});

// Berita
Breadcrumbs::for('berita', function ($trail) {
    $trail->parent('beranda'); // Parent-nya adalah Beranda
    $trail->push('Berita', route('berita'));
});

// Prakiraan Cuaca
Breadcrumbs::for('prakiraan-cuaca', function ($trail) {
    $trail->parent('beranda'); // Parent-nya adalah Beranda
    $trail->push('Prakiraan Cuaca', route('prakiraan-cuaca'));
});

// Portal Belanja
Breadcrumbs::for('portal-belanja', function ($trail) {
    $trail->parent('beranda'); // Parent-nya adalah Beranda
    $trail->push('Portal Belanja', route('portal-belanja'));
});

// Belanja
Breadcrumbs::for('belanja', function ($trail) {
    $trail->parent('portal-belanja'); // Parent-nya adalah Portal Belanja
    $trail->push('Belanja', route('belanja'));
});
