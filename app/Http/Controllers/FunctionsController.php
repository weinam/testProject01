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
    	$functions = DB::table('functions')->where('is_deleted', '=', false)
    										->get();
    	return view('functions.index', compact('functions'));
    }

    public function create()
    {
        $projects = DB::table('projects')->get();
    	return view('functions.create', compact('projects'));
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
    	return view('functions.show', compact('function'));
    }

    public function edit(Functions $function)
    {
    	return view('functions.edit', compact('function'));
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
