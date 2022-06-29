<?php

namespace App\Http\Controllers;

use App\Aduan;
use App\Berita;
use App\Forum;
use App\User;
use App\DetailForum;
use App\Komentar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function index()
    {

        // $forum = DetailForum::all();

        $forum = DB::table('forum')
            ->join('users', 'users.id', '=', 'forum.IDUser')
            ->join('detailforum', 'detailforum.IDForum', '=', 'forum.id')
            ->select('users.*', 'users.name', 'forum.IDUser', 'forum.id as IDForum', 'detailforum.id', 'detailforum.Judul', 'detailforum.Gambar', 'detailforum.Deskripsi', 'detailforum.created_at')
            ->orderBy('detailforum.created_at', 'desc')
            ->paginate(5);
        // $forum = DetailForum::paginate(5);
        // dd($forum);
        return view('Admin.adminForum', compact((['forum'])));
    }

    public function berita()
    {
        $berita = Berita::orderBy('updated_at', 'DESC')->get();

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

        return redirect('/admin-berita')->with('success', 'Berita anda berhasil di buat!');
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

            Berita::where('id', $berita_id)->update([
                'judul' => $request->judul,
                'description' => $request->description,
                'image' => $request->image->getClientOriginalName()
            ]);
        } else {
            Berita::where('id', $berita_id)->update([
                'judul' => $request->judul,
                'description' => $request->description
            ]);
        }

        return redirect('/admin-berita')->with('success', 'Berita anda berhasil di update!');
    }
    public function deleteBerita($berita_id)
    {

        Berita::where('id', $berita_id)->delete();

        return redirect('/admin-berita')->with('success', 'Berita anda berhasil di hapus!');
    }

    public function AduanDetailKelurahan(Request $request, $id)
    {

        // $AduanDetail =  Aduan::find($id);
        // dd($AduanDetail);

        $AduanDetail = DB::table('pengaduan')
            ->join('users', 'users.id', '=', 'pengaduan.IDUser')
            ->where('pengaduan.id', $id)
            ->select('users.*', 'users.name', 'pengaduan.IDUser', 'pengaduan.id', 'pengaduan.bagian', 'pengaduan.Judul', 'pengaduan.Gambar', 'pengaduan.Deskripsi', 'pengaduan.created_at')
            ->get();


        // dd($AduanDetail);
        return view('Admin.adminKelurahanAduanDetail', compact('AduanDetail'));
    }

    public function viewKelurahan()
    {
        $Aduan = DB::table('pengaduan')
            ->join('users', 'users.id', '=', 'pengaduan.IDUser')
            ->select('users.*', 'users.name', 'pengaduan.id as IdPengaduan', 'users.id as IdUser', 'pengaduan.Bagian', 'pengaduan.Judul', 'pengaduan.Gambar', 'pengaduan.Deskripsi', 'pengaduan.created_at')
            ->orderBy('pengaduan.created_at', 'asc')
            ->get();
        //  dd($Aduan);

        return view('Admin.adminKelurahanAduanStatus')->with('Aduan', $Aduan)->with('success', 'Aduan berhasil di tindak lanjut ke Instansi!');
    }
    public function AduanDetail(Request $request, $id)
    {

        // $AduanDetail =  Aduan::find($id);
        // dd($AduanDetail);
        $AduanDetail = DB::table('pengaduan')
            ->join('users', 'users.id', '=', 'pengaduan.IDUser')
            ->where('pengaduan.id', $id)
            ->select('users.*', 'users.name', 'pengaduan.IDUser', 'pengaduan.id', 'pengaduan.bagian', 'pengaduan.Judul', 'pengaduan.Gambar', 'pengaduan.Deskripsi', 'pengaduan.created_at')
            ->get();


        //  dd($AduanDetail);
        return view('Admin.adminKelurahanAduanDetail', compact('AduanDetail'));
    }

    public function ForumDetail(Request $request, $ForumID)
    {
        // $ForumDetail =  DetailForum::find($ForumID);
        // $data = Komentar::where('IDDetForum', $ForumID)->get();
        $ForumDetail = DB::table('detailforum')
            ->join('forum', 'forum.id', '=', 'detailforum.IDForum')
            ->join('users', 'users.id', '=', 'forum.IDUser')
            ->where('detailforum.id', $ForumID)
            ->select('users.*', 'users.name', 'detailforum.Judul', 'detailforum.Deskripsi', 'detailforum.Gambar as gambar', 'detailforum.created_at', 'detailforum.id')
            ->first();
        $data = DB::table('komentar')
            ->join('users', 'users.id', '=', 'komentar.IDUser')
            ->where('komentar.IDDetForum', $ForumID)
            ->select('users.*', 'users.name', 'komentar.id', 'komentar.Komentar', 'komentar.created_at')
            ->get();
        // dd($ForumDetail->gambar);
        return view('Forum.ForumDetailKelurahan', compact('ForumDetail', 'data'));
    }
}