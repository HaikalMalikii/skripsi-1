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

    public function index()
    {
        if (request()->user()->hasRole('admin_instansi_umum')) {
            return view('/home');
        } else {
            return redirect('/home');
        } 
    }

}
