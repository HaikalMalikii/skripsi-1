<?php

namespace App\Http\Controllers;

use App\Forum;
use App\User;
use App\DetailForum;
use App\Komentar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;

class ForumController extends Controller
{
    //
    protected $table = 'forum';

    public function GetUserID($users)
    {
        $users = User::where('id', $users )->first();

        return view ('Forum.addforum', ['users'=>$users]);
    }
    public function index()
    {
        $forum = DetailForum::paginate(10);
        //dd($forum);
        // $x = new DetailForum();
        // $komentar = Komentar::where('IDDetForum','=', $x->id)->first();
        return view('Forum.index',compact((['forum'])));
    }
    public function IndexComments()
    {
        $ForumDetailComment = DetailForum::paginate(5);

        return view('Forum.ForumDetail', compact((['ForumDetailComment'])));

    }

//    public function AddForum()
//    {
//        $forum = Forum::paginate(10);
//        return view('forum.addforum',compact((['forum'])));
//    }

    public function AddForum(Request $request, Forum $forum)
    {


        $users = Auth::id();
        $validasi = Validator::make($request->all(),[
            'forumjuduladd'=>'required|string|max:20',
            'aspirasi'=>'required|string|max:20',
            'imageforumadd'=>'required|image'
        ]);
        if ($validasi->fails()) {
            return redirect('/addforum')
                ->withErrors($validasi)
                ->withInput();
        }
        $photo = $request->file('imageforumadd');
        $photo->move(public_path('/css/foto'),$photo->getClientOriginalName());
        $Tanggal_now =  Carbon::now();
        $user = Auth::user();



        DB::table('forum')->insert(
            [
                'IDUser' => $user->id,
                'created_at' => $Tanggal_now,
                'updated_at' => $Tanggal_now
            ]);
        $forum = Forum::latest()->first();
        DB::table('detailforum')->insert(
            [

                'IDForum' => $forum->id,
                'Deskripsi' => $request -> aspirasi,
                'Judul' => $request -> forumjuduladd,
                'Gambar' =>$request -> imageforumadd -> getClientOriginalName(),
                'created_at' => $Tanggal_now,
                'updated_at' => $Tanggal_now

            ]);

        return redirect('/forum');


    }

    public function ForumDetail(Request $request,$ForumID)
    {
        $ForumDetail =  DetailForum::find($ForumID);
        //$ForumDetail = DetailForum::all();
        //dd($ForumDetail);
        $data = DB::table('detailforum')
        ->join('komentar', 'komentar.IDDetForum', '=', 'detailforum.id')
        ->get();
        // return view ('Forum.ForumDetail', ['ForumDetail'=>$ForumDetail]);
        return view('Forum.ForumDetail', compact('ForumDetail', 'data'));
    }


    public function ForumDetailComment(Request $request,$slug,$id)
    {
        $request->validate([
        'comment'=>'required'
        ]);
        // $data = new Komentar;
        // $data->IDDetForum = $id;
        // $data->IDUser=$request->user()->id;
        // $data->Aspirasi_Komen = $request->comment;
        // $data->save();
        DB::table('komentar')->insert(
            [
                'IDDetForum' => $id,
                'IDUser' => $request->user()->id,
                'Komentar' =>$request -> comment
            ]);
        // $forum = DetailForum::all();
        // $komentar = Komentar::where('IDDetForum','=',$id)->first();
        // return view('ForumDetail', compact(['test']));
        return redirect('/forum');

    }
}
