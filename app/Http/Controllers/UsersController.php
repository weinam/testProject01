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
   
        $user_roles_id = json_decode($user->role_id)->role_id;
        $isChecked = array();
        if ($user_roles_id != null) {
            for ($i=0; $i<sizeof($roles); $i++) {
                for ($j=0; $j<sizeof($user_roles_id); $j++) {
                    if ($roles[$i]->id == $user_roles_id[$j]) {
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
                $roles = DB::table('roles')->where('is_deleted', '=', false)
                                            ->get();

                for ($i=0; $i<sizeof($user['role_id']); $i++) {
                    for ($j=0; $j<sizeof($roles); $j++) {
                        if ($user['role_id'][$i] == $roles[$j]->id) {
                            $project_id[] = $roles[$j]->project_id;
                        }
                    }
                }
                $storeArray = [
                    'role_id' => ($user['role_id']),
                    'project_id' => ($project_id),
                ];
                $user['role_id'] = json_encode($storeArray);
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
