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
        $projects = auth()->user()->projects;

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

    public function store()
    {
        $validated = $this->validateProject();

        $validated['owner_id'] = auth()->id();

    	$project = Project::create($validated);

        // Mail::to('weinam95@gmail.com')->send(
        //     new ProjectCreated($project)
        // );

    	return redirect('/projects');
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project)
    {
        $this->authorize('update', $project);

        $project->update($this->validateProject());

        return redirect('/projects');
    }

    public function destroy(Project $project)
    {
        $this->authorize('update', $project);

        $project->delete();

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




