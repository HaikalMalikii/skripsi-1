<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PunyaGueController extends Controller
{
    //

    public function __construct()
    {
      $this->middleware('auth');
    }

    public function dashboard()
    {
        // if (request()->user()->hasRole('punya_gue')) {
        //     return view('Admin.dashboard');
        // } else {
        //     return redirect('/home');
        // }
        return view("Admin.dashboard");
    }

}
