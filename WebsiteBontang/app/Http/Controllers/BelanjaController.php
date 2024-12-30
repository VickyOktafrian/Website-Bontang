<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BelanjaController extends Controller
{
    public function index($slug) 
    {
        // Cari barang berdasarkan slug
        $barang = Barang::where('slug', $slug)->firstOrFail();
        
        
        
        // Kembalikan pandangan dengan data barang dan tajuk
        return view('user.belanja', [
            
            'barang' => $barang,
            'title' => $barang->nama,
        ]);
    }
}
