<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class PortalBelanjaController extends Controller
{
    public function index()
    {

        // Mengambil data berita
        $barang = Barang::orderBy('id', 'asc')->get();        

        // Mengirim data carousel dan berita ke view
        return view('user.portal-belanja', compact( 'barang'));
    }
}
