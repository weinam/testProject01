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
        $role_id = json_decode($user->role_id);

        if ($role_id != null) {
            for ($i=0; $i<sizeof($role_id); $i++) {
                $roles[] = DB::table('roles')->where('id', '=', $role_id[$i])
                                            ->value('function');
            }
            if ($roles != null) {
                for ($i=0; $i<sizeof($roles); $i++) {
                    $temp = json_decode($roles[$i]);
                    for ($j=0; $j<sizeof($temp); $j++) {
                        $functions[] = DB::table('functions')->where('id', '=', $temp[$j]) 
                                                                ->value('name');
                    }
                }
            }
        }
        else
            $functions = array();
        
        return view('home.index', compact('functions'));
    }
}
