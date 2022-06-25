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
use PhpParser\Comment;

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
       
        // $forum = DetailForum::all();
        
        $forum = DB::table('forum')
        ->join('users', 'users.id', '=', 'forum.IDUser')
        ->join('detailforum','detailforum.IDForum', '=' ,'forum.id')
        ->select('users.*', 'users.name','detailforum.id','detailforum.Judul','detailforum.Gambar','detailforum.Deskripsi','detailforum.created_at')
        ->get();
        $forum = DetailForum::paginate(5);
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
            'Judul'=>'required|string|max:20',
            'Deskripsi'=>'required|string|max:200',
            'Gambar'=>'image'
        ]);
        if ($validasi->fails()) {
            return redirect('/forum')
                ->withErrors($validasi)
                ->withInput();
        }
        $photo = $request->file('Gambar');
        $photo->move(public_path('/css/foto'),$photo->getClientOriginalName());
        $Tanggal_now =  Carbon::now();
        $user = Auth::user();



        // DB::table('forum')->insert(
        //     [
        //         'IDUser' => $user->id,
        //         'created_at' => $Tanggal_now,
        //         'updated_at' => $Tanggal_now
        //     ]);
        $ForumInsert = new Forum;
        $ForumInsert -> IDUser = $request->user()->id;
        $ForumInsert -> save();
        
        // DB::table('detailforum')->insert(
        //     [

        //         'IDForum' => $forum->id,
        //         'Deskripsi' => $request -> aspirasi,
        //         'Judul' => $request -> forumjuduladd,
        //         'Gambar' =>$request -> imageforumadd -> getClientOriginalName(),
        //         'created_at' => $Tanggal_now,
        //         'updated_at' => $Tanggal_now

        //     ]);
        $forum = Forum::latest()->first();
        $DetailForum = new DetailForum;
        $DetailForum -> IDForum = $forum->id;
        $DetailForum -> Deskripsi = $request -> Deskripsi;
        $DetailForum -> Gambar = $request -> Gambar -> getClientOriginalName();
        $DetailForum -> Judul = $request -> Judul;
        $DetailForum -> save();

        return redirect('/forum');


    }

    public function ForumDetail(Request $request,$ForumID)
    {
        // $ForumDetail =  DetailForum::find($ForumID);
        // $data = Komentar::where('IDDetForum', $ForumID)->get();
        $ForumDetail = DB::table('detailforum')
        ->join('forum', 'forum.id', '=', 'detailforum.IDForum')
        ->join('users','users.id', '=' ,'forum.IDUser')
        ->where('detailforum.id',$ForumID)
        ->select('users.*', 'users.name','detailforum.Judul','detailforum.Deskripsi','detailforum.Gambar as gambar','detailforum.created_at','detailforum.id' )
        ->first();
        $data = DB::table('komentar')
        ->join('users', 'users.id', '=', 'komentar.IDUser')
        ->where('komentar.IDDetForum',$ForumID)
        ->select('users.*', 'users.name','komentar.id','komentar.Komentar','komentar.created_at')
        ->get();
        // dd($ForumDetail->gambar);
        return view('Forum.ForumDetail', compact('ForumDetail','data'));
    }


    public function ForumDetailComment(Request $request,$slug,$id)
    {
        $request->validate([
        'comment'=>'required'
        ]);

        // dd($id);
        $Komentar = new Komentar;
        $Komentar -> IDDetForum = $id;
        $Komentar -> IDUser = $request->user()->id;
        $Komentar -> Komentar =  $request -> comment;
        $Komentar -> save();

        return redirect('/forum');

    }

    public function forumUser(Request $request, $id) {

        $forum = Forum::where('IDUser', $id)->get();

        $forum = DB::table('forum')
        ->join('users', 'users.id', '=', 'forum.IDUser')
        ->join('detailforum','detailforum.IDForum', '=' ,'forum.id')
        ->select('users.*', 'users.name','detailforum.id','detailforum.Judul','detailforum.Gambar','detailforum.Deskripsi','detailforum.created_at')
        ->get();
        $forum = DetailForum::paginate(3);
        return view('Forum.forumUser',compact((['forum'])));
        
    }
}
