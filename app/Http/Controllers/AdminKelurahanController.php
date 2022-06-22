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
            'description' => 'required|string|min:10',
            'image' => 'required|image'
        ]);

        $file = $request->file('image');
        $destinationPath = 'css/foto/';
        $file->move($destinationPath, $request->image->getClientOriginalName());

        Berita::create([
            'judul' => $request->judul,
            'description' => $request->description,
            'image' => $request->image->getClientOriginalName()
        ]);

        return redirect('/admin-berita');
    }
    public function editBerita(Request $request, $berita_id)
    {
        $request->validate([
            'judul' => 'required|string|min:5',
            'description' => 'required|string|min:10',
            'image' => 'required|image'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $destinationPath = 'css/foto/';
            $file->move($destinationPath, $request->image->getClientOriginalName());

            // Berita::where('id', $berita_id)->update([
            //     'judul' => $request->judul,
            //     'description' => $request->description,
            //     'image' => $request->image->getClientOriginalName()
            // ]);

            $Berita = new Berita;
            $Berita -> judul = $request->judul;
            $Berita -> description = $request->description;
            $Berita -> image = $request->image;

            $Berita -> save();

        } else {
            $Berita = new Berita;
            $Berita -> judul = $request->judul;
            $Berita -> description = $request->description;
            

            $Berita -> save();
        }

        return redirect('/admin-berita');
    }
    public function deleteBerita($berita_id)
    {

        Berita::where('id', $berita_id)->delete();

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