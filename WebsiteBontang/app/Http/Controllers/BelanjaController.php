<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BelanjaController extends Controller
{
    // Menampilkan halaman detail barang berdasarkan slug
    public function index($slug) 
    {
        // Mencari barang berdasarkan slug yang diterima
        $barang = Barang::where('slug', $slug)->firstOrFail();
        
        // Mengembalikan tampilan (view) dengan data barang dan judul halaman
        return view('user.belanja', [
            'barang' => $barang,  // Mengirim data barang ke tampilan
            'title' => $barang->nama,  // Mengirim nama barang sebagai judul halaman
        ]);
    }
}
