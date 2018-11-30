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
    	return view('roles.index', compact('roles'));
    }

    public function create()
    {
    	return view('roles.create');
    }

    public function store(Request $request)
    {
    	switch($request->input('action')) {
            case 'create':
            	$validated = $this->validated();
            	Roles::create($validated);
                return redirect('/roles');
            case 'back':
                return redirect('/roles');
        }
    }

    public function show(Roles $role)
    {
    	return view('roles.show', compact('role'));
    }

    public function edit(Roles $role)
    {
        return view('roles.edit', compact('role'));
    }

    public function update(Request $request, Roles $role)
    {
        switch($request->input('action')) {
            case 'edit':
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
