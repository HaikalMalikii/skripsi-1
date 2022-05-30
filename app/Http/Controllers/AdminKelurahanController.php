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

    public function dashboard()
    {
        return view('/Admin.dashboard');
    }

}
