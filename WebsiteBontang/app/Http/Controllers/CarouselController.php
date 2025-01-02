<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Wisata;
use App\Models\Carousel;
use Illuminate\Http\Request;
use App\Models\Berita; 

class CarouselController extends Controller
{
    /**
     * Menampilkan halaman beranda dengan data carousel, berita, barang, dan wisata.
     */
    public function index()
    {
        // Mengambil data carousel, diurutkan berdasarkan ID terbaru
        $carousel = Carousel::orderBy('id', 'desc')->get();
        
        // Mengambil 6 berita terbaru, diurutkan berdasarkan ID
        $berita = Berita::orderBy('id', 'desc')->take(6)->get();        
        
        // Mengambil 6 barang terbaru, diurutkan berdasarkan ID
        $barang = Barang::orderBy('id', 'desc')->take(6)->get();        
        
        // Mengambil seluruh data wisata, diurutkan berdasarkan ID
        $pariwisata = Wisata::orderBy('id', 'asc')->get();        

        // Mengembalikan tampilan (view) beranda dengan data carousel, berita, barang, dan wisata
        return view('user.beranda', compact('carousel', 'berita', 'pariwisata', 'barang'))
            ->with('title', 'Beranda'); // Menambahkan title untuk halaman beranda
    }
}
