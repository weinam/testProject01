<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $role = json_decode(DB::table('roles')->where('role_name', '=', $user->role)
                                                ->value('function'));
        for ($i=0; $i<sizeof($role); $i++) {
            $functions[] = DB::table('functions')->where('id', '=', $role[$i])
                                                    ->value('name');
        }
        return view('home.index', compact('functions'));
    }
}
