<?php

namespace App\Http\Controllers;

use App\Mail\ProjectCreated;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();
        if ($user->isAdmin == true) {
            $projects = DB::table('projects')->where('is_deleted', '=', false)->get();
            if (sizeof($projects) != 0) {
                $projects_id = json_decode($user->rp_id)->project_id;
                if ($projects_id[0] != 0) {
                    foreach ($projects_id as $project_id) {
                        foreach ($projects as $project) {
                            if ($project_id == $project->id) {
                                $finals[] = $project;
                            }
                        }
                    }
                }
                else 
                    $finals = array();
            }
            else
                $finals = array();
                
            return view('projects.index', compact('finals'));
        }
        else
            echo "NAH... NAH... NAH... DON'T TRY TO HACK. BE KIND. PLEASE LEAVE THIS PAGE, YOU VISIT A WRONG WEBSITE.";
    }

    public function create()
    {
        $user = auth()->user();
        if ($user->isAdmin == true) {
            return view('projects.create');
        }
        else
            echo "NAH... NAH... NAH... DON'T TRY TO HACK. BE KIND. PLEASE LEAVE THIS PAGE, YOU VISIT A WRONG WEBSITE.";
    }

    public function show(Project $project)
    {
        $user = auth()->user();
        if ($user->isAdmin == true) {
            $this->authorize('update', $project);
        
            return view('projects.show', compact('project'));
        }
        else
            echo "NAH... NAH... NAH... DON'T TRY TO HACK. BE KIND. PLEASE LEAVE THIS PAGE, YOU VISIT A WRONG WEBSITE.";
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
        // Mail::to('weinam95@gmail.com')->send(
        //     new ProjectCreated($project)
        // );
    }

    public function edit(Project $project)
    {
        $user = auth()->user();
        if ($user->isAdmin == true) {
            return view('projects.edit', compact('project'));
        }
        else
            echo "NAH... NAH... NAH... DON'T TRY TO HACK. BE KIND. PLEASE LEAVE THIS PAGE, YOU VISIT A WRONG WEBSITE.";
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




