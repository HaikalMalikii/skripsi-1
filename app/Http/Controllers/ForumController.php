<?php

namespace App\Http\Controllers;

use App\Forum;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

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
        $forum = Forum::paginate(10);
        return view('forum.index',compact((['forum'])));
    }

//    public function AddForum()
//    {
//        $forum = Forum::paginate(10);
//        return view('forum.addforum',compact((['forum'])));
//    }

    public function AddForum(Request $request)
    {

        $users = Auth::id();
        $validasi = Validator::make($request->all(),[
            'forumjuduladd'=>'required|string|max:20',
            'aspirasi'=>'required|string|max:20',
            'imageforumadd'=>'required|image'
        ]);
        if ($validasi->fails()) {
            return redirect('/addpizza')
                ->withErrors($validasi)
                ->withInput();
        }
        $photo = $request->file('imageforumadd');
        $photo->move(public_path('/css/foto'),$photo->getClientOriginalName());
        $Tanggal_now =  Carbon::now();
        DB::table('forum')->insert(
            [   'Title'=>$request->forumjuduladd,
                'Aspirasi'=>$request->aspirasi,
                'Photo_Forum'=>$photo->getClientOriginalName(),
                'User_Id' => $users -> id,
                'Tanggal' => $Tanggal_now


            ]);
        return redirect('/home');


    }
}
