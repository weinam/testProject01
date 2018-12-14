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
        $user_roles_id = json_decode($user->role_id);

        $projects = DB::table('projects')->where('is_deleted', '=', false)
                                            ->get();
        foreach ($user_roles_id->project_id as $pro_id) {
            foreach ($projects as $project) {
               if ($pro_id == $project->id)
                    $finals[] = $project;
            }
        }
    	return view('projects.index', compact('finals'));
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
        // Mail::to('weinam95@gmail.com')->send(
        //     new ProjectCreated($project)
        // );
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




