<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        if($user->role == 'admin')
            $max = 6;
        else if($user->role == 'security')
            $max = 4;
        else
            $max = 1;
        return view('home.index', compact('max', 'user'));
    }
}
