<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    protected $table = 'forum';

    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
    {
        if (request()->user()->hasRole('users')) {
            return view('/home');
        } else {
            return view('/home');
        } 
    }
}