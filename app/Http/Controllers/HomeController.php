<?php

namespace App\Http\Controllers;

use App\Aduan;
use Illuminate\Http\Request;
use App\Berita;
use App\Forum;
use App\DetailForum;
use Illuminate\Support\Facades\Auth;

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
        $berita = Berita::all();
        $Forum = Forum::all();
        $detailforum = DetailForum::all();
        $id = Auth::id();
        $AduanList = Aduan::where('IDUser', $id)->get();
        if ($request->user()->hasRole('users')) {

            return view('home')
                ->with('berita', $berita)
                ->with('forum', $Forum)
                ->with('detailforum', $detailforum)
                ->with('data',$AduanList);
            // return redirect('users'); 
        }

        if ($request->user()->hasRole('admin_kelurahan')) {
            return redirect('/Admin.dashboardAdminKelurahan');
        } else if ($request->user()->hasRole('admin_instansi_umum')) {
            return redirect('/Admin.dashboardAdminInstansi');
        } else if ($request->user()->hasRole('punya_gue')) {
            return redirect('/Admin.dashboard');
        }
        else{
            return view('home')
            ->with('berita', $berita)
            ->with('forum', $Forum)
            ->with('detailforum', $detailforum);
        }

    }
}