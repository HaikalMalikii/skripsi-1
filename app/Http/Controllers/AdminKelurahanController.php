<?php

namespace App\Http\Controllers;
use App\Berita;
use Illuminate\Http\Request;

class AdminKelurahanController extends Controller
{
    //

    public function __construct()
    {
      $this->middleware('auth');
    }

    public function dashboardAdminKelurahan()
    {
        return view('/Admin.dashboardAdminKelurahan');
    }

    public function berita()
    {
        $berita = Berita::all();

        return view('Admin.berita')->with('berita', $berita);
    }

    public function addBerita(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|min:5',
            'description' => 'required|string|min:10'
        ]);

        Berita::create([
            'judul' => $request->judul,
            'description' => $request->description
        ]);

        return redirect('/admin-berita');
    }

    public function store(Request $request)
    {

    }

    public function show(Berita $berita)
    {

    }

    public function edit(Berita $berita)
    {

    }

    public function update(Request $request, Berita $berita)
    {

    }

    public function destroy(Berita $berita)
    {

    }

}
