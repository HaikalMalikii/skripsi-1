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
        $validasi = Validator::make($request->all(), [
            'Judul' => 'string|max:20',
            'Bagian' => 'required|string',
            'Deskripsi' => 'required|string',
            'Gambar' => 'required|image'
        ]);
        if ($validasi->fails()) {
            return redirect('/AddAduan')
                ->withErrors($validasi)
                ->withInput();
        }
        $photo = $request->file('Gambar');
        $photo->move(public_path('/css/foto'), $photo->getClientOriginalName());
        $Tanggal_now =  Carbon::now();
        // DB::table('pengaduan')->insert(
        //     [   'Bagian'=>$request->AddAduanBagian,
        //         'Deskripsi'=>$request->AddAduanDeskripsi,
        //         'Judul'=>$request->AddAduanJudul,
        //         'Gambar'=>$photo->getClientOriginalName(),
        //         'IDUser' => $request->user()-> id,

        //     ]);

        $Aduan = new Aduan;
        $Aduan->Bagian = $request->Bagian;
        $Aduan->Judul = $request->Judul;
        $Aduan->Deskripsi = $request->Deskripsi;
        $Aduan->Gambar = $request->Gambar;
        $Aduan->IDUser = $request->user()->id;
        $Aduan->save();
        return redirect('/');
    }

    public function view()
    {
        $Aduan = DB::table('pengaduan')
            ->join('users', 'users.id', '=', 'pengaduan.IDUser')
            ->select('users.*', 'users.name', 'pengaduan.id', 'pengaduan.bagian', 'pengaduan.Judul', 'pengaduan.Gambar', 'pengaduan.Deskripsi', 'pengaduan.created_at')
            ->orderBy('users.created_at', 'desc')
            ->get();
        // dd($Aduan->first());

        return view('Aduan.AduanView')->with('Aduan', $Aduan);
    }

    public function AduanDetail(Request $request, $id)
    {

        // $AduanDetail =  Aduan::find($id);
        // dd($AduanDetail);
        $AduanDetail = DB::table('pengaduan')
            ->join('users', 'users.id', '=', 'pengaduan.IDUser')
            ->where('pengaduan.id', $id)
            ->select('users.*', 'users.name', 'pengaduan.id', 'pengaduan.bagian', 'pengaduan.Judul', 'pengaduan.Gambar', 'pengaduan.Deskripsi', 'pengaduan.created_at')
            ->get();


        //  dd($AduanDetail);
        return view('Aduan.AduanDetail', compact('AduanDetail'));
    }

    public function AduanDetailUser(Request $request, $id)
    {

        // $AduanDetail =  Aduan::find($id);
        // dd($AduanDetail);
        $AduanDetail = DB::table('pengaduan')
            ->join('users', 'users.id', '=', 'pengaduan.IDUser')
            ->where('pengaduan.id', $id)
            ->select('users.*', 'users.name', 'pengaduan.id', 'pengaduan.bagian', 'pengaduan.Judul', 'pengaduan.Gambar', 'pengaduan.Deskripsi', 'pengaduan.created_at')
            ->get();


        //  dd($AduanDetail);
        return view('Aduan.AduanDetailUser', compact('AduanDetail'));
    }




    public function viewUser(Request $request, $id)
    {

        $data = Aduan::where('IDUser', $id)->get();
        $data = Aduan::paginate(5);
        $data = DB::table('pengaduan')
            ->join('users', 'users.id', '=', 'pengaduan.IDUser')
            ->where('pengaduan.IDUser', $id)
            ->select('users.*', 'users.name', 'pengaduan.id', 'pengaduan.Persetujuan', 'pengaduan.bagian', 'pengaduan.Judul', 'pengaduan.Gambar', 'pengaduan.Deskripsi', 'pengaduan.created_at')
            ->get();
        dd($data);

        return view('Aduan.AduanViewUser', compact('data'));
    }

    public function Status(Request $request, $id)
    {
        $request->input('status');

        if ($request->status == ("Approve")) {

            $Aduan = Aduan::find($id);
            $Aduan->Persetujuan = 1;
            $Aduan->save();
        }

        if ($request->status == ("Reject")) {

            $Aduan = Aduan::find($id);
            $Aduan->Persetujuan = 2;
            $Aduan->save();
        }

        // if ($request->status == ("Pending")) {

        //     $Aduan = Aduan::find($id);
        //     $Aduan->Persetujuan = 3;
        //     $Aduan->save();
        // }
        // dd($request->input('status'));
        return redirect('/');
    }
}