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

    public function index()
    {
        if (request()->user()->hasRole('punya_gue')) {
            return view('/');
        } else {
            return redirect('/');
        } 
    }

}
