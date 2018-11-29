<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class APIController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

	public function index()
	{
		$user = auth()->user();
		return view('api.index', compact('user'));
	}
}
