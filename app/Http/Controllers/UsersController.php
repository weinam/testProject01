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
    	$roles = DB::table('roles')->where('is_deleted', '=', false)
                                    ->get();
   
        $user_roles = json_decode($user->role_id);
        $isChecked = array();
        if ($user_roles != null) {
            for ($i=0; $i<sizeof($roles); $i++) {
                for ($j=0; $j<sizeof($user_roles); $j++) {
                    if ($roles[$i]->id == $user_roles[$j]) {
                        $isChecked[$i] = true;
                        break;
                    }
                    else
                        $isChecked[$i] = false;
                }
            }
        }
    
    	return view('users.edit', compact('user', 'roles', 'isChecked'));
    }

    public function update(Request $request, User $user)
    {
    	switch($request->input('action')) {
            case 'edit':
            	foreach ($request->except('_token','_method','action') as $key => $value) {
            		$user[$key] = $value;
            	}
                $user['role_id'] = json_encode($user['role_id']);
                if ($request->has('isAdmin')) 
                    $user['isAdmin'] = true;
                else
                    $user['isAdmin'] = false;
            	$user->update();
                return redirect('/users');
            case 'back':
                return redirect('/users');
        }
    }
}
