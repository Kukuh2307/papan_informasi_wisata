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
        $Fasilitas = Fasilitas::first();
        return view('home', [
            'img' => $ProfileWisata['image'],
            'qrcode' => $Fasilitas['bahasa_isyarat'],
            'deskripsi' => $ProfileWisata['deskripsi'],
        ]);
    }
}
