<?php

namespace App\Http\Controllers;

use App\Aduan;
use Illuminate\Http\Request;
use App\Berita;
use App\Forum;
use App\DetailForum;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function view()
    // {
    //     $berita = Berita::all();
    //     $Forum = Forum::all();
    //     $detailforum = DetailForum::all();
    //     return view('home')
    //         ->with('berita', $berita)
    //         ->with('forum', $Forum)
    //         ->with('detailforum', $detailforum);
    // }

    public function index(Request $request)
    {
        // $berita = Berita::paginate(1, ['*'], 'berita');
        $berita = DB::table('berita')->orderBy('created_at', 'desc')->paginate(3, ['*'], 'berita');
        $Forum = Forum::all();
        $detailforum = DB::table('detailforum')->orderBy('created_at', 'desc')->paginate(5, ['*'], 'detailforum');
        $id = Auth::id();
        // $AduanList = Aduan::where('IDUser', $id)->get();
        $Aduan = DB::table('pengaduan')
            ->join('users', 'users.id', '=', 'pengaduan.IDUser')
            ->where('pengaduan.IDUser', 'users.id')
            ->select('users.*', 'users.name', 'pengaduan.id', 'pengaduan.bagian', 'pengaduan.Judul', 'pengaduan.Gambar', 'pengaduan.Deskripsi', 'pengaduan.created_at')
            ->get();
        if ($request->user()->hasRole('users')) {

            return view('home')
                ->with('berita', $berita)
                ->with('forum', $Forum)
                ->with('detailforum', $detailforum)
                ->with('data', $Aduan);
            // return redirect('users');
        }

        if ($request->user()->hasRole('admin_kelurahan')) {
            return redirect('/Admin.dashboardAdminKelurahan');
        } else if ($request->user()->hasRole('admin_instansi_umum')) {
            return redirect('/Admin.dashboardAdminInstansi');
        } else if ($request->user()->hasRole('punya_gue')) {
            return redirect('/Admin.dashboard');
        } else {
            return view('home')
                ->with('berita', $berita)
                ->with('forum', $Forum)
                ->with('detailforum', $detailforum);
        }
    }
}