<?php

namespace App\Http\Controllers;

use App\Forum;
use App\User;
use App\DetailForum;
use App\Komentar;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
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
        $users = User::where('id', $users)->first();

        return view('Forum.addforum', ['users' => $users]);
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
        return view('Forum.index', compact((['forum'])));
    }
    public function IndexComments()
    {
        $ForumDetailComment = DetailForum::paginate(5);

        return view('Forum.ForumDetail', compact((['ForumDetailComment'])));
    }


    public function AddForum(Request $request, Forum $forum)
    {
        $users = Auth::id();
        $validasi = Validator::make($request->all(), [
            'Judul' => 'required|string|min:5',
            'Deskripsi' => 'required|string|min:5',
            'Gambar' => 'required|image'
        ]);
        if ($validasi->fails()) {
            return redirect('/forum')
                ->withErrors($validasi)
                ->withInput();
            // return back()->with('errors', $validasi->messages()->all()[0])->withInput();
        }
        $photo = $request->file('Gambar');
        $photo->move(public_path('/css/foto'), $photo->getClientOriginalName());

        $ForumInsert = new Forum;
        $ForumInsert->IDUser = $request->user()->id;
        $ForumInsert->save();
        $forum = Forum::latest()->first();
        $DetailForum = new DetailForum;
        $DetailForum->IDForum = $forum->id;
        $DetailForum->Deskripsi = $request->Deskripsi;
        $DetailForum->Gambar = $request->Gambar->getClientOriginalName();
        $DetailForum->Judul = $request->Judul;

        $DetailForum->save();
        // $request->session()->flash('key', $value);
        // $request->session()->flash('addForumPopUp', 'Forum berhasil ditambahkan!');
        return redirect('/forum')->with('success', 'Forum anda berhasil di buat!');
        // return redirect('/forum');
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
        return view('Forum.ForumDetail', compact('ForumDetail', 'data'));
    }


    public function ForumDetailComment(Request $request, $slug, $id)
    {
        $request->validate([
            'comment' => 'required'
        ]);
        // dd($id);
        // dd($id);
        $Komentar = new Komentar;
        $Komentar->IDDetForum = $id;
        $Komentar->IDUser = $request->user()->id;
        $Komentar->Komentar =  $request->comment;
        // dd($Komentar);
        $Komentar->save();

        return redirect('/ForumDetail/' . $id);
    }

    public function forumUser(Request $request, $id)
    {

        $forum = Forum::where('IDUser', $id)->get();

        $forum = DB::table('forum')
            ->join('users', 'users.id', '=', 'forum.IDUser')
            ->join('detailforum', 'detailforum.IDForum', '=', 'forum.id')
            ->select('users.*', 'users.name', 'detailforum.id', 'forum.id as IDForum', 'detailforum.Judul', 'detailforum.Gambar', 'detailforum.Deskripsi', 'detailforum.created_at')
            ->orderBy('detailforum.created_at', 'desc')
            ->paginate(3);
        // $forum = DetailForum::paginate(3);
        return view('Forum.forumUser', compact((['forum'])));
    }

    public function deleteForum(Request $request, $id)
    {
        Forum::where('id', $id)->delete();
        $idUser = Auth::id();
        return redirect('/forumUser/' . $idUser);
    }

    public function editForum(Request $request, $id)
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

            DetailForum::where('id', $id)->update([
                'Judul' => $request->judul,
                'Deskripsi' => $request->description,
                'Gambar' => $request->image->getClientOriginalName()
            ]);
        } else {
            DetailForum::where('id', $id)->update([
                'Judul' => $request->judul,
                'Deskripsi' => $request->description
            ]);
        }
        $idUser = Auth::id();
        return redirect('/forumUser/' . $idUser);
    }
}