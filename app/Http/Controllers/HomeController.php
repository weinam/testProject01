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
        $user_roles_id = json_decode($user->role_id);
        $roles_function = DB::table('roles')->where('is_deleted', '=', false)
                                            ->get();
        $functions = DB::table('functions')->where('is_deleted', '=', false)
                                            ->get()->keyBy('id');
            
        if ($user_roles_id != null) {
            foreach ($user_roles_id->role_id as $role_id) {
                foreach ($roles_function as $role_function) {
                    if ($role_id == $role_function->id) {
                        $functionsArray[] = $role_function->function;
                    }
                }
            }
            for ($i=0; $i<sizeof($functionsArray); $i++) {
                $temp = json_decode($functionsArray[$i]);
                for ($j=0; $j<sizeof($temp); $j++) {
                    $finals[] =  $functions->get($temp[$j]);
                }
            }     
        }
        else
            $finals = array();
                 
        return view('home.index', compact('finals'));
    }
}
