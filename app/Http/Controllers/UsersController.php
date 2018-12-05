<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function index()
    {
    	$users = DB::table('users')->get();
    	return view('users.index',compact('users'));
    }

    public function show(User $user)
    {
    	return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
    	$roles = DB::table('roles')->get();
    	return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
    	switch($request->input('action')) {
            case 'edit':
            	foreach ($request->except('_token','_method','action') as $key => $value) {
            		$user[$key] = $value;
            	}
            	$user->update();
                return redirect('/users');
            case 'back':
                return redirect('/users');
        }
    }
}
