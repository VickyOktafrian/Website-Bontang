<?php
namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Berita;  // Pastikan Anda mengimpor model Berita
use App\Models\Wisata;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    public function index()
    {
        $carousel = Carousel::orderBy('id', 'desc')->get();
        
        $berita = Berita::orderBy('id', 'asc')->take(6)->get();        
        $pariwisata = Wisata::orderBy('id', 'asc')->get();        

        return view('user.beranda', compact('carousel', 'berita', 'pariwisata'))->with('title', 'Beranda');
    }
}
