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
            'Alamat' => 'required|string|min:10',
            'Deskripsi' => 'required|string|min:20',
            'Gambar' => 'required',
            'Gambar.*' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $Gambar = array();

        if ($validasi->fails()) {
            return redirect('/AddAduan')
                ->withErrors($validasi)
                ->withInput();
        }

        if ($files = $request->file('Gambar')) {
            foreach ($files as $file) {
                $image_name = $file->getClientOriginalName();
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name;
                $upload_path = 'public/css/foto/';
                $image_url = $upload_path . $image_full_name;
                $file->move($upload_path, $image_full_name);
                $image[] = $image_url;
            }
        }
        //  dd($image_url);
        //Multiple


        // if($request->hasFile('Gambar'))
        // {
        //     foreach ($request->file('Gambar') as $image) {
        //     $name = $image->getClientOriginalName();
        //     $image->move(public_path().'/css/foto/', $name) ;
        //     $data[]=$name;
        //     // $destinationPath = 'public/css/foto/'; // upload path
        //     // $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
        //     // $files->move($destinationPath, $profileImage);
        //     // $insert[]['Gambar'] = "$profileImage";
        //     // $check = Aduan::insert($insert);
        //     }
        // }


        // $photo = $request->file('Gambar');
        // $photo->move(public_path('/css/foto'), $photo->getClientOriginalName());



        $Aduan = new Aduan;
        $Aduan->Bagian = $request->Bagian;
        $Aduan->Judul = $request->Judul;
        $Aduan->Deskripsi = $request->Deskripsi;
        $Aduan->Location = $request->Alamat;
        $Aduan->Gambar = implode('|', $image);

        $Aduan->IDUser = $request->user()->id;
        // dd($Aduan->Bagian);
        $Aduan->save();
        $idUser = Auth::id();
        return redirect('/AduanViewUser')->with('success', 'Aduan anda berhasil di buat!');
    }
    public function view()
    {
        $Aduan = DB::table('pengaduan')
            ->join('users', 'users.id', '=', 'pengaduan.IDUser')
            ->select('users.*', 'users.name', 'pengaduan.id', 'pengaduan.Bagian', 'pengaduan.Persetujuan', 'pengaduan.Judul', 'pengaduan.Gambar', 'pengaduan.Deskripsi', 'pengaduan.Alasan', 'pengaduan.created_at')
            ->orderBy('pengaduan.created_at', 'desc')
            ->orderBy('pengaduan.Persetujuan', 'asc')
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


        return redirect('/admin-kelurahan-status')->with('success', 'Aduan berhasil di tindak lanjut ke Instansi!');
    }

    public function viewKebersihan()
    {
        $Aduan = DB::table('pengaduan')
            ->join('users', 'users.id', '=', 'pengaduan.IDUser')
            ->select('users.*', 'users.name', 'pengaduan.id', 'pengaduan.Bagian', 'pengaduan.Persetujuan', 'pengaduan.Judul', 'pengaduan.Gambar', 'pengaduan.Deskripsi', 'pengaduan.Alasan', 'pengaduan.created_at')
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
            ->select('users.*', 'users.name', 'pengaduan.id', 'pengaduan.Bagian', 'pengaduan.Persetujuan', 'pengaduan.Judul', 'pengaduan.Gambar', 'pengaduan.Deskripsi', 'pengaduan.Alasan', 'pengaduan.created_at')
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
            ->select('users.*', 'users.name', 'pengaduan.id', 'pengaduan.Bagian', 'pengaduan.Persetujuan', 'pengaduan.Judul', 'pengaduan.Gambar', 'pengaduan.Deskripsi', 'pengaduan.Alasan', 'pengaduan.created_at')
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
            ->select('users.*', 'users.name', 'pengaduan.id', 'pengaduan.Bagian', 'pengaduan.Persetujuan', 'pengaduan.Judul', 'pengaduan.Gambar', 'pengaduan.Deskripsi', 'pengaduan.Alasan', 'pengaduan.created_at')
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
            ->select('users.*', 'users.name', 'pengaduan.id', 'pengaduan.Bagian', 'pengaduan.Persetujuan', 'pengaduan.Judul', 'pengaduan.Gambar', 'pengaduan.Deskripsi', 'pengaduan.Alasan', 'pengaduan.created_at')
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
            ->select('users.*', 'users.name', 'pengaduan.id', 'pengaduan.Bagian', 'pengaduan.Persetujuan', 'pengaduan.Judul', 'pengaduan.Gambar', 'pengaduan.Deskripsi', 'pengaduan.Alasan', 'pengaduan.created_at')
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
            ->select('users.*', 'users.name', 'pengaduan.IDUser', 'pengaduan.Persetujuan', 'pengaduan.id', 'pengaduan.bagian', 'pengaduan.Judul', 'pengaduan.Gambar', 'pengaduan.Deskripsi', 'pengaduan.Alasan', 'pengaduan.created_at')
            ->get();
        $image = DB::table('pengaduan')->where('id', $id)->first();
        $images = explode('|', $image->Gambar);
        // dd($AduanDetail);
        return view('Aduan.AduanDetail', compact('AduanDetail', 'images'));
    }


    public function AduanDetailUser(Request $request, $id)
    {

        // $AduanDetail =  Aduan::find($id);
        // dd($AduanDetail);
        $AduanDetail = DB::table('pengaduan')
            ->join('users', 'users.id', '=', 'pengaduan.IDUser')
            ->where('pengaduan.id', $id)
            ->select('users.*', 'users.name', 'pengaduan.id', 'pengaduan.Persetujuan', 'pengaduan.bagian', 'pengaduan.Judul', 'pengaduan.Gambar', 'pengaduan.Deskripsi', 'pengaduan.Alasan', 'pengaduan.created_at')
            ->get();
        $image = DB::table('pengaduan')->where('id', $id)->first();
        // dd($image);
        $images = explode('|', $image->Gambar);


        //  dd($AduanDetail);
        return view('Aduan.AduanDetailUser', compact('AduanDetail', 'images'));
    }

    public function viewUser(Request $request)
    {
        $id = Auth::id();
        $data = Aduan::where('IDUser', $id)->get();
        // $data = Aduan::paginate(5);
        $data = DB::table('pengaduan')
            ->join('users', 'users.id', '=', 'pengaduan.IDUser')
            ->where('pengaduan.IDUser', $id)
            ->select('users.*', 'users.name', 'pengaduan.id', 'pengaduan.Persetujuan', 'pengaduan.Bagian', 'pengaduan.Judul', 'pengaduan.Gambar', 'pengaduan.Deskripsi', 'pengaduan.Alasan', 'pengaduan.created_at')
            ->orderBy('pengaduan.created_at', 'desc')

            ->paginate(4);
        // dd($data);

        return view('Aduan.AduanViewUser', compact('data'));
    }

    public function Status(Request $request, $id)
    {
        $request->input('status');
        $request->validate([
            'alasan' => 'required|string'
        ]);
        // dd($request->alasan);

        if ($request->status == ("Approve")) {
            Aduan::where('id', $id)->update([
                'Alasan' => $request->alasan,
                'Persetujuan' => 1
            ]);
        }

        if ($request->status == ("Reject")) {

            Aduan::where('id', $id)->update([
                'Alasan' => $request->alasan,
                'Persetujuan' => 2
            ]);
        }

        return redirect('/Aduan')->with('success', 'Status Aduan ditambahkan!');;
    }

    public function deleteAduan($id)
    {
        Aduan::where('id', $id)->delete();
        $idUser = Auth::id();
        return redirect('/AduanViewUser')->with('success', 'Aduan anda berhasil di hapus!');

        // return redirect('/AduanViewUser/' . $idUser)->with('success', 'Aduan anda berhasil di hapus!');
    }
}