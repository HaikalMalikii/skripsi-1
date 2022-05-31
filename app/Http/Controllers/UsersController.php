<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
    {
        if (request()->user()->hasRole('users')) {
            return view('/home');
        } else {
            return redirect('/home');
        } 
    }
}