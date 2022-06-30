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
    public function BacktoAduanViewUser(Request $request)
    {

        $id = Auth::id();
        $data = Aduan::where('IDUser', $id)->get();
        // $data = Aduan::paginate(5);
        $data = DB::table('pengaduan')
            ->join('users', 'users.id', '=', 'pengaduan.IDUser')
            ->where('pengaduan.IDUser', $id)
            ->select('users.*', 'users.name', 'pengaduan.id', 'pengaduan.Persetujuan', 'pengaduan.Bagian', 'pengaduan.Judul', 'pengaduan.Gambar', 'pengaduan.Deskripsi', 'pengaduan.created_at')
            ->orderBy('pengaduan.created_at', 'desc')

            ->paginate(4);
        //dd($data);
        // dd($data->Gambar)

        return view('Aduan.AduanViewUser', compact('data'));
    }

    public function AddAduan(Request $request, Aduan $Aduan)
    {

        $users = Auth::id();
        $validasi = Validator::make($request->all(), [
            'Judul' => 'required|string|min:5',
            'Bagian' => 'required|not_in:Bagian...',
            'Location' => 'required|string|min:10',
            'Deskripsi' => 'required|string|min:20',
            'Gambar' => 'required|image'
        ]);
        if ($validasi->fails()) {
            return redirect('/AddAduan')
                ->withErrors($validasi)
                ->withInput();
        }

        $photo = $request->file('Gambar');
        $photo->move(public_path('/css/foto'), $photo->getClientOriginalName());


        // $Tanggal_now =  Carbon::now();

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
        $Aduan->Location = $request->Location;
        $Aduan->Gambar = $photo->getClientOriginalName();
        $Aduan->IDUser = $request->user()->id;
        // dd($Aduan->Bagian);
        $Aduan->save();
        $idUser = Auth::id();
        return redirect('/AduanViewUser/' . $idUser)->with('success', 'Aduan anda berhasil di buat!');
    }
    public function view()
    {
        $Aduan = DB::table('pengaduan')
            ->join('users', 'users.id', '=', 'pengaduan.IDUser')
            ->select('users.*', 'users.name', 'pengaduan.id', 'pengaduan.Bagian', 'pengaduan.Judul', 'pengaduan.Gambar', 'pengaduan.Deskripsi', 'pengaduan.created_at')
            ->orderBy('pengaduan.created_at', 'desc')
            ->get();
        // dd($Aduan->first());

        return view('Aduan.AduanView')->with('Aduan', $Aduan);
    }

    public function tindakLanjutAduan(Request $request, $id)
    {
        // dd($id);
        $request->validate([
            'judul' => 'required|string',
        ]);

        Aduan::where('id', $id)->update([
            'Judul' => $request->judul
        ]);


        return redirect('/admin-kelurahan-status')->with('success', 'Berhasil Ditambahkan!');;
    }

    public function viewKebersihan()
    {
        $Aduan = DB::table('pengaduan')
            ->join('users', 'users.id', '=', 'pengaduan.IDUser')
            ->select('users.*', 'users.name', 'pengaduan.id', 'pengaduan.Bagian', 'pengaduan.Judul', 'pengaduan.Gambar', 'pengaduan.Deskripsi', 'pengaduan.created_at')
            ->where('pengaduan.Bagian', 'Kebersihan')
            ->orderBy('pengaduan.created_at', 'desc')
            ->get();
        // dd($Aduan);

        return view('Admin.adminAduanView')->with('Aduan', $Aduan);
    }
    public function viewKesehatan()
    {
        $Aduan = DB::table('pengaduan')
            ->join('users', 'users.id', '=', 'pengaduan.IDUser')
            ->select('users.*', 'users.name', 'pengaduan.id', 'pengaduan.Bagian', 'pengaduan.Judul', 'pengaduan.Gambar', 'pengaduan.Deskripsi', 'pengaduan.created_at')
            ->where('pengaduan.Bagian', 'Kesehatan')
            ->orderBy('pengaduan.created_at', 'desc')
            ->get();
        // dd($Aduan);

        return view('Admin.adminAduanView')->with('Aduan', $Aduan);
    }
    public function viewPublik()
    {
        $Aduan = DB::table('pengaduan')
            ->join('users', 'users.id', '=', 'pengaduan.IDUser')
            ->select('users.*', 'users.name', 'pengaduan.id', 'pengaduan.Bagian', 'pengaduan.Judul', 'pengaduan.Gambar', 'pengaduan.Deskripsi', 'pengaduan.created_at')
            ->where('pengaduan.Bagian', 'Fasilitas Publik')
            ->orderBy('pengaduan.created_at', 'desc')
            ->get();
        // dd($Aduan);

        return view('Admin.adminAduanView')->with('Aduan', $Aduan);
    }

    public function viewKebersihanInstansi()
    {
        $Aduan = DB::table('pengaduan')
            ->join('users', 'users.id', '=', 'pengaduan.IDUser')
            ->select('users.*', 'users.name', 'pengaduan.id', 'pengaduan.Bagian', 'pengaduan.Judul', 'pengaduan.Gambar', 'pengaduan.Deskripsi', 'pengaduan.created_at')
            ->where('pengaduan.Bagian', 'Kebersihan')
            ->orderBy('pengaduan.created_at', 'desc')
            ->get();
        // dd($Aduan);

        return view('Aduan.AduanView')->with('Aduan', $Aduan);
    }
    public function viewKesehatanInstansi()
    {
        $Aduan = DB::table('pengaduan')
            ->join('users', 'users.id', '=', 'pengaduan.IDUser')
            ->select('users.*', 'users.name', 'pengaduan.id', 'pengaduan.Bagian', 'pengaduan.Judul', 'pengaduan.Gambar', 'pengaduan.Deskripsi', 'pengaduan.created_at')
            ->where('pengaduan.Bagian', 'Kesehatan')
            ->orderBy('pengaduan.created_at', 'desc')
            ->get();
        // dd($Aduan);

        return view('Aduan.AduanView')->with('Aduan', $Aduan);
    }
    public function viewPublikInstansi()
    {
        $Aduan = DB::table('pengaduan')
            ->join('users', 'users.id', '=', 'pengaduan.IDUser')
            ->select('users.*', 'users.name', 'pengaduan.id', 'pengaduan.Bagian', 'pengaduan.Judul', 'pengaduan.Gambar', 'pengaduan.Deskripsi', 'pengaduan.created_at')
            ->where('pengaduan.Bagian', 'Fasilitas Publik')
            ->orderBy('pengaduan.created_at', 'desc')
            ->get();
        // dd($Aduan);

        return view('Aduan.AduanView')->with('Aduan', $Aduan);
    }


    public function AduanDetail(Request $request, $id)
    {

        // $AduanDetail =  Aduan::find($id);
        // dd($AduanDetail);
        $AduanDetail = DB::table('pengaduan')
            ->join('users', 'users.id', '=', 'pengaduan.IDUser')
            ->where('pengaduan.id', $id)
            ->select('users.*', 'users.name', 'pengaduan.IDUser', 'pengaduan.Persetujuan', 'pengaduan.id', 'pengaduan.bagian', 'pengaduan.Judul', 'pengaduan.Gambar', 'pengaduan.Deskripsi', 'pengaduan.created_at')
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




    public function viewUser(Request $request)
    {
        $id = Auth::id();
        $data = Aduan::where('IDUser', $id)->get();
        // $data = Aduan::paginate(5);
        $data = DB::table('pengaduan')
            ->join('users', 'users.id', '=', 'pengaduan.IDUser')
            ->where('pengaduan.IDUser', $id)
            ->select('users.*', 'users.name', 'pengaduan.id', 'pengaduan.Persetujuan', 'pengaduan.Bagian', 'pengaduan.Judul', 'pengaduan.Gambar', 'pengaduan.Deskripsi', 'pengaduan.created_at')
            ->orderBy('pengaduan.created_at', 'desc')

            ->paginate(4);
        // dd($data);

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

    public function deleteAduan($id)
    {
        Aduan::where('id', $id)->delete();
        $idUser = Auth::id();
        return redirect('/AduanViewUser/' . $idUser)->with('success', 'Aduan anda berhasil di hapus!');
    }
}