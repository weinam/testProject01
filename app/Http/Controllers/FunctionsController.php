<?php

namespace App\Http\Controllers;

use App\Functions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class FunctionsController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if ($user->isAdmin == true) {
            $projects_id = json_decode($user->role_id)->project_id;
            if (sizeof($projects_id) <= 1) {
                $finals = DB::table('functions')->where('is_deleted', '=', false)
                                                    ->where('project_id', '=', $projects_id[0])
                                                    ->get();
            }
            else {
                $functions = DB::table('functions')->where('is_deleted', '=', false)
                                                    ->get();
                foreach ($projects_id as $project_id) {
                    foreach ($functions as $function) {
                        if ($project_id == $function->project_id) {
                            $finals[] = $function;
                        }
                    }
                }
            }
            return view('functions.index', compact('finals'));
        }
        else
            echo "NAH... NAH... NAH... DON'T TRY TO HACK. BE KIND. PLEASE LEAVE THIS PAGE, YOU VISIT A WRONG WEBSITE.";
    }

    public function create()
    {
        $user = auth()->user();
        if ($user->isAdmin == true) {
            $projects = DB::table('projects')->get();
            return view('functions.create', compact('projects'));
        }
        else
            echo "NAH... NAH... NAH... DON'T TRY TO HACK. BE KIND. PLEASE LEAVE THIS PAGE, YOU VISIT A WRONG WEBSITE.";
    }

    public function store(Request $request)
    {
    	switch($request->input('action')) {
    		case 'create':
    			Functions::create($request->all());
    			return redirect('/functions');
    		case 'back':
    			return redirect('/functions');
    	}
    }

    public function show(Functions $function)
    {
        $user = auth()->user();
        if ($user->isAdmin == true) {
            return view('functions.show', compact('function'));
        }
        else
            echo "NAH... NAH... NAH... DON'T TRY TO HACK. BE KIND. PLEASE LEAVE THIS PAGE, YOU VISIT A WRONG WEBSITE.";
    }

    public function edit(Functions $function)
    {
        $user = auth()->user();
        if ($user->isAdmin == true) {
            return view('functions.edit', compact('function'));
        }
        else
            echo "NAH... NAH... NAH... DON'T TRY TO HACK. BE KIND. PLEASE LEAVE THIS PAGE, YOU VISIT A WRONG WEBSITE.";
    }

    public function update(Request $request, Functions $function)
    {
    	switch ($request->input('action')) {
    		case 'edit':
    			$function->update($request->all());
    			return redirect('/functions');
    		case 'back':
    			return redirect('/functions');
    	}
    }

    public function delete(Functions $function)
    {
    	$function->is_deleted = true;
    	$function->update();

    	return redirect('/functions');
    }
}
