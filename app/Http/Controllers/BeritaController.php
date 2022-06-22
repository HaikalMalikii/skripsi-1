<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;

class BeritaController extends Controller
{
    public function listBerita()
    {
        $berita = Berita::all();

        return view('Berita.listBerita')->with('berita', $berita);
    }

    public function detailBerita($slug)
    {
        $berita = Berita::where('slug', $slug)->first();

        return view('Admin.detailBerita')->with('berita', $berita);
    }
}