<?php

namespace App\Http\Controllers;

use App\Models\Barang; // Mengimpor model Barang untuk mengakses data produk
use Illuminate\Http\Request; // Mengimpor Request untuk menangani inputan dari pengguna

class PortalBelanjaController extends Controller
{
    // Fungsi untuk menampilkan halaman portal belanja
    public function index()
    {
        // Mengambil semua data barang dari database dan mengurutkannya berdasarkan ID secara ascending
        $barang = Barang::orderBy('id', 'asc')->get();         // 'get()' untuk mengambil semua data

        // Mengirimkan data barang ke view 'user.portal-belanja' untuk ditampilkan
        return view('user.portal-belanja', compact('barang')); // 'compact' untuk membuat array data barang
    }
}
