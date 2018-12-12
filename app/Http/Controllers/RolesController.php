<?php

namespace App\Http\Controllers;

use App\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RolesController extends Controller
{
    public function index()
    {
    	$roles = DB::table('roles')->where('is_deleted','=',false)
                                    ->get();
    	return view('roles.index', compact('roles', 'user'));
    }

    public function create(Request $request)
    {
        $functions = DB::table('functions')->where('is_deleted', '=', false)
                                            ->get();
        $projects = DB::table('projects')->get();
        if (session()->has('project_id')) 
            $session_project_id = session('project_id');
        else 
            $session_project_id = 1;
    	return view('roles.create', compact('functions', 'projects', 'session_project_id'));
    }

    public function store(Request $request)
    {
    	switch($request->input('action')) {
            case 'create':
            	$validated = $this->validated();
                $validated['function'] = json_encode($request->input('function'));
                $validated['project_id'] = $request->input('project_id');
            	Roles::create($validated);
                return redirect('/roles');
            case 'back':
                return redirect('/roles');
        }
        if ($request->input('project_id')) {
            return redirect('/roles/create')->with(['project_id'=>$request->input('project_id')]);
        }
    }

    public function show(Roles $role)
    {
    	return view('roles.show', compact('role'));
    }

    public function edit(Roles $role)
    {
        $isChecked = array();
        $role->function = json_decode($role->function);
        $functions = DB::table('functions')->where('is_deleted', '=', false)
                                            ->where('project_id', '=', $role->project_id)
                                            ->get();
        if ($role->function != null) {
            for ($i=0; $i<sizeof($functions); $i++) {
                for ($j=0; $j<sizeof($role->function); $j++) {
                    if ($functions[$i]->id == $role->function[$j]) {
                        $isChecked[$i] = true;
                        break;
                    }
                    else
                        $isChecked[$i] = false;
                }
            }
        }
        return view('roles.edit', compact('role', 'isChecked', 'functions'));
    }

    public function update(Request $request, Roles $role)
    {
        switch($request->input('action')) {
            case 'edit':
                $function = json_encode($request->input('function'));
                $role['function'] = $function;
                $role->update($this->validated());
                return redirect('/roles');
            case 'back':
                return redirect('/roles');
        }
    }

    public function delete(Roles $role)
    {
        $role['is_deleted'] = true;
        $role->update();

        return redirect('/roles');
    }

    public function validated()
    {
        return request()->validate([
            'role_name' => ['required', 'min:3'],
        ]);
    }
}
