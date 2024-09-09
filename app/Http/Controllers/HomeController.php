<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\ProfileWisata;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // index
    public function index()
    {
        $ProfileWisata = ProfileWisata::first();
        return view('index', [
            'img' => $ProfileWisata['image'],
        ]);
    }

    public function home()
    {
        $ProfileWisata = ProfileWisata::first();
        $FasilitasAll = Fasilitas::all();
        return view('home', [
            'img' => $ProfileWisata['image'],
            'qrcode' => $ProfileWisata['qrcode'],
            'deskripsi' => $ProfileWisata['deskripsi'],
            'detail_info' => $ProfileWisata,
            'fasilitas' => $FasilitasAll,
        ]);
    }
}
