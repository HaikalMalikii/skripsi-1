<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminInstansiUmumController extends Controller
{
    //

    public function __construct()
    {
      $this->middleware('auth');
    }

    public function dashboardAdminInstansi()
    {
        return view('/Admin.dashboardAdminInstansi');
    }
}
