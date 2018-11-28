<?php

namespace App\Http\Controllers;

use App\Project;
use App\Mail\ProjectCreated;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $projects = auth()->user()->projects->where('is_deleted','=',false);

    	return view('projects.index', compact('projects'));
    }

    public function create()
    {
    	return view('projects.create');
    }

    public function show(Project $project)
    {
        $this->authorize('update', $project);
        
        return view('projects.show', compact('project'));
    }

    public function store(Request $request)
    {
        switch($request->input('action')) {
            case 'create':
                $validated = $this->validateProject();
                $validated['owner_id'] = auth()->id();
                $project = Project::create($validated);
                return redirect('/projects');
            case 'back':
                return redirect('/projects');
        }

     //    $validated = $this->validateProject();

     //    $validated['owner_id'] = auth()->id();

    	// $project = Project::create($validated);

        // Mail::to('weinam95@gmail.com')->send(
        //     new ProjectCreated($project)
        // );

    	// return redirect('/projects');
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        switch($request->input('action')) {
            case 'edit':
                $this->authorize('update', $project);
                $project->update($this->validateProject());
                return redirect('/projects');
            case 'back':
                return redirect('/projects');
        }
        

        

        
    }

    public function delete(Project $project)
    {
        $this->authorize('update', $project);

        $project['is_deleted'] = true;
        $project->save();
        // $project->delete();

        return redirect('/projects');
    }

    public function validateProject()
    {
        return request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:3'],
        ]);
    }
}




