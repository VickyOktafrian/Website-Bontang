<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    public function index()
    {
        // Mengambil data carousel dari database
        $carousel = Carousel::orderBy('id', 'desc')->get();

        // Mengirim data carousel dan title ke view
        return view('user.beranda', compact('carousel'))->with('title', 'Beranda');
    }
}
