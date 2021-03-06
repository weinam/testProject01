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
        if ($user->rp_id != null) {
            $roles = DB::table('roles')->where('is_deleted', '=', false)->get();
            $functions = DB::table('functions')->where('is_deleted', '=', false)->get()->keyBy('id');
            if (sizeof($roles) != 0 && sizeof($functions) != 0) {
                $roles_id = json_decode($user->rp_id)->role_id;;
                if ($roles_id[0] != 0) {
                    foreach ($roles_id as $role_id) {
                        foreach ($roles as $role) {;
                            if ($role_id == $role->id) {
                                $functionsArray[] = $role->function;
                            }
                        }
                    }
                    foreach ($functionsArray as $functionArray) {
                        $temps = json_decode($functionArray);
                        foreach ($temps as $temp) {
                            if ($functions->get($temp) != null)
                                $finals[] = $functions->get($temp);
                            else
                                $finals = array();
                        }
                    }
                }
                else {
                    $finals = array();
                }
            }
            else
                $finals = array(); 
        }
        else {
            DB::table('users')->where('id', '=', $user->id)
                                ->update(['rp_id' => '{"role_id":["0"],"project_id":[0]}']);
            $finals = array();
        }
        return view('home.index', compact('finals'));
    }
}
