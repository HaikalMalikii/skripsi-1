<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;
use Illuminate\Support\Facades\DB;

class BeritaController extends Controller
{
    public function listBerita()
    {
        $berita = DB::table('berita')->orderBy('created_at', 'desc')->paginate(5, ['*'], 'berita');

        return view('Berita.listBerita')->with('berita', $berita);
    }

    public function detailBerita($id)
    {
        $berita =  Berita::findOrFail($id);

        return view('Admin.detailBerita', compact('berita'));
    }
}