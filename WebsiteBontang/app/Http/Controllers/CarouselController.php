<?php

namespace App\Http\Controllers;

use App\Models\carousel;
use Illuminate\Http\Request;
use App\Filament\Resources\CarouselResource;

class CarouselController extends Controller
{
    
    public function index(){
        // Fetch carousel data from the database
        $carousel = carousel::orderBy('id', 'desc')->get();
    
        // Return the view and pass the carousel data
        return view('user.beranda', compact('carousel'));
    }
}
