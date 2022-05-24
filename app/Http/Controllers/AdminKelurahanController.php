<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminKelurahanController extends Controller
{
    //

    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
    {
        if (request()->user()->hasRole('admin_kelurahan')) {
            return view('/');
        } else {
            return redirect('/');
        } 
    }

}
