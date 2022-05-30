<?php

namespace App\Http\Controllers;

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
<<<<<<< HEAD
            return redirect('/  AddAduan')
=======
            return redirect('/AddAduan')
>>>>>>> a833bf5f02290c36a4112937bf4d056d6ca00ac3
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
}
