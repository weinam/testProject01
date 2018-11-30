<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RolesSetController extends Controller
{
    public function create()
    {
    	$users = DB::table('users')->get();
    	$roles = DB::table('roles')->get();;
    	return view('rolesset.create', compact('users', 'roles'));
    }

    public function store(Request $request)
    {
    	DB::table('users')->where('name', '=', $request->user)
    					->update(['role' => $request->role]);

        return redirect('/roles');
    }
}

