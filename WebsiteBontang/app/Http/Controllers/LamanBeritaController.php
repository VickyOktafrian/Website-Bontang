<?php

namespace App\Http\Controllers;

use App\Models\Berita;

class LamanBeritaController extends Controller
{
    /**
     * Menampilkan daftar berita dengan paginasi
     */
    public function index()
    {
        // Mengambil data berita, diurutkan berdasarkan ID secara ascending dan dipaginasi sebanyak 13 berita per halaman
        $berita = Berita::orderBy('id', 'asc')->paginate(13);        

        // Mengirimkan data berita ke view 'user.laman-berita' dengan judul 'Laman Berita'
        return view('user.laman-berita', compact('berita'))->with('title', 'Laman Berita');
    }
}
