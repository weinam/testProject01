<?php

namespace App\Http\Controllers;

use App\Functions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FunctionsController extends Controller
{
    public function index()
    {
    	$functions = DB::table('functions')->get();
    	return view('functions.index', compact('functions'));
    }

    public function create()
    {
    	return view('functions.create');
    }

    public function store()
    {
    	return redirect('/functions');
    }

    public function show(Functions $function)
    {
    	return view('functions.show', compact('function'));
    }

    public function edit()
    {
    	return view('functions.edit');
    }

    public function update()
    {
    	return redirect('/functions');
    }

    public function delete()
    {
    	return redirect('/functions');
    }
}
