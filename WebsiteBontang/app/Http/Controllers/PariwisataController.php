<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;

class PariwisataController extends Controller
{
    // Menampilkan data pariwisata dari database dan mengirimkannya ke view
    public function index()
    {
        // Mengambil semua data pariwisata dari model Wisata dan mengurutkannya berdasarkan ID secara ascending
        $pariwisata = Wisata::orderBy('id', 'asc')->get();

        // Mengirim data pariwisata ke view 'components.pariwisata'
        return view('components.pariwisata', compact('pariwisata'));
    }
}
