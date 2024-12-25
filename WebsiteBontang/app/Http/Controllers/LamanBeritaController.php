<?php

namespace App\Http\Controllers;

use App\Models\Berita;


class LamanBeritaController extends Controller
{
    public function index()
    {

        // Mengambil data berita
        $berita = Berita::orderBy('id', 'asc')->paginate(13);        

        // Mengirim data carousel dan berita ke view
        return view('user.laman-berita', compact( 'berita'))->with('title', 'Laman Berita');
    }
}
