<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;

class WisataController extends Controller
{
    // Fungsi untuk menampilkan informasi wisata berdasarkan slug
    public function index($slug) 
    {
        // Mengambil data wisata berdasarkan slug yang diberikan
        // Jika data wisata tidak ditemukan, maka akan menghasilkan error 404
        $wisata = Wisata::where('slug', $slug)->firstOrFail();

        // Mengirim data wisata ke view 'user.wisata' dengan judul dinamis
        return view('user.wisata', [
            'wisata' => $wisata, // Data wisata yang ditemukan
            'title' => $wisata->judul, // Judul wisata untuk ditampilkan di title halaman
        ]);
    }
}
