<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if ($user->isAdmin == true) {
            $users = DB::table('users')->get();
            $finals = $users;
        }
        else 
            echo "NAH... NAH... NAH... DON'T TRY TO HACK. BE KIND. PLEASE LEAVE THIS PAGE, YOU VISIT A WRONG WEBSITE.";
        
    	return view('users.index',compact('finals'));
    }

    public function show(User $user)
    {
    	return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
    	$roles = DB::table('roles')->where('is_deleted', '=', false)->get();
        $roles_id = json_decode($user->rp_id)->role_id;
        if ($roles_id[0] != 0) {
            for ($i=0; $i<sizeof($roles); $i++) {
                for ($j=0; $j<sizeof($roles_id); $j++) {
                    if ($roles[$i]->id == $roles_id[$j]) {
                        $isChecked[$i] = true;
                        break;
                    }
                    else
                        $isChecked[$i] = false;
                }
            }
        }
        else {
            $isChecked = array();
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
                $roles = DB::table('roles')->where('is_deleted', '=', false)->get();

                for ($i=0; $i<sizeof($user['rp_id']); $i++) {
                    for ($j=0; $j<sizeof($roles); $j++) {
                        if ($user['rp_id'][$i] == $roles[$j]->id) {
                            $project_id[] = $roles[$j]->project_id;
                        }
                    }
                }
                $storeArray = [
                    'role_id' => ($user['rp_id']),
                    'project_id' => ($project_id),
                ];
                $user['rp_id'] = json_encode($storeArray);
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
