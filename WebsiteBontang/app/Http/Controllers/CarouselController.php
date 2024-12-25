<?php
namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Berita;  // Pastikan Anda mengimpor model Berita
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    public function index()
    {
        // Mengambil data carousel dari database
        $carousel = Carousel::orderBy('id', 'desc')->get();
        
        // Mengambil data berita
        $berita = Berita::orderBy('id', 'asc')->take(6)->get();        

        // Mengirim data carousel dan berita ke view
        return view('user.beranda', compact('carousel', 'berita'))->with('title', 'Beranda');
    }
}
