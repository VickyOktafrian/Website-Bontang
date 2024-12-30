<?php
namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Wisata;
use App\Models\Carousel;
use Illuminate\Http\Request;
use App\Models\Berita;  // Pastikan Anda mengimpor model Berita

class CarouselController extends Controller
{
    public function index()
    {
        $carousel = Carousel::orderBy('id', 'desc')->get();
        
        $berita = Berita::orderBy('id', 'asc')->take(6)->get();        
        $barang = Barang::orderBy('id', 'asc')->take(6)->get();        
        $pariwisata = Wisata::orderBy('id', 'asc')->get();        

        return view('user.beranda', compact('carousel', 'berita', 'pariwisata','barang'))->with('title', 'Beranda');
    }
}
