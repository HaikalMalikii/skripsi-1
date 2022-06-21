<?php

namespace App\Http\Controllers;

use App\Aduan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\User;

class AduanController extends Controller
{
    //
    public function AddAduan(Request $request)
    {

        $users = Auth::id();
        $validasi = Validator::make($request->all(),[
            'AddAduanJudul'=>'required|string|max:20',
            'AddAduanBagian'=>'required|string',
            'AddAduanDeskripsi'=>'required|string',
            'AddAduanGambar'=>'required|image'
        ]);
        if ($validasi->fails()) {
            return redirect('/AddAduan')
                ->withErrors($validasi)
                ->withInput();
        }
        $photo = $request->file('AddAduanGambar');
        $photo->move(public_path('/css/foto'),$photo->getClientOriginalName());
        $Tanggal_now =  Carbon::now();
        DB::table('pengaduan')->insert(
            [   'Bagian'=>$request->AddAduanBagian,
                'Deskripsi'=>$request->AddAduanDeskripsi,
                'Judul'=>$request->AddAduanJudul,
                'Gambar'=>$photo->getClientOriginalName(),
                'IDUser' => $request->user()-> id,

            ]);
        return redirect('/home');


    }

    public function view()
    {
        $Aduan = Aduan::all();
        //dd($forum);
        // $x = new DetailForum();
        // $komentar = Komentar::where('IDDetForum','=', $x->id)->first();
        return view('Aduan.AduanView')->with('Aduan', $Aduan);
    }
}
