<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;

class PariwisataController extends Controller
{
    public function index(){
        $pariwisata = Wisata::orderBy('id', 'asc')->get();        

        // Mengirim data carousel dan berita ke view
        return view('components.pariwisata', compact('pariwisata'));
    }
}
