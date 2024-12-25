<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;

class PariwisataController extends Controller
{
    public function index(){

        $wisata = Wisata::orderBy('id', 'asc')->get();
        return view('component.pariwisata', compact( 'wisata'));
    }

}
