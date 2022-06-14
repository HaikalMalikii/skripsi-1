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

    public function dashboardAdminKelurahan()
    {
        return view('/Admin.dashboardAdminKelurahan');
    }

}
