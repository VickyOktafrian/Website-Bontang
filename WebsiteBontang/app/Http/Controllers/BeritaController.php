<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Menampilkan daftar berita berdasarkan slug.
     */
    public function index($slug) 
    {
        // Mencari berita berdasarkan slug yang diterima
        $berita = Berita::where('slug', $slug)->firstOrFail();
        
        // Mengembalikan tampilan (view) dengan data berita dan judul
        return view('user.berita', [
            'berita' => $berita,  // Mengirim data berita ke tampilan
            'title' => $berita->judul,  // Mengirim judul berita sebagai judul halaman
        ]);
    }
}
