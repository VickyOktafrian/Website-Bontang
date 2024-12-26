<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;

class WisataController extends Controller
{
    public function index($slug) 
    {
        $wisata = Wisata::where('slug', $slug)->firstOrFail();
        
        
        
        return view('user.wisata', [
            
            'wisata' => $wisata,
            'title' => $wisata->judul,
        ]);
    }
}
