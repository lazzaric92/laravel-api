<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $projects = Project::where('user_id', Auth::id())->orderBy('date', 'desc')->paginate(15);   // # a guest user can see only their projects
        $projects = Project::orderBy('date', 'desc')->paginate(15);  // # an admin user can see all the projects
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('project', 'types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        // dd($request->all());
        $data = $request->validated();
        $img_path = Storage::put('projects', $data['image']);  // # store the image file in uploads/projects folder and return a local path to the db

        $data['user_id'] = Auth::user()->id;  // or Auth::id()
        $data['image'] = $img_path;
        $newProject = Project::create($data);
        $newProject->technologies()->sync($data['technologies']);

        return redirect()->route('admin.projects.show', $newProject);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();
        $img_path = Storage::put('projects', $data['image']);
        $data['image'] = $img_path;
        $project->update($data);
        $project->technologies()->sync($data['technologies']);
        return redirect()->route('admin.projects.show', $project)->with('message', $project->title.' was updated succesfully');
    }

    /**
     * Soft delete the specified resource.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('message', $project['title'] . ' has been deleted');
    }

    /**
     * Display the list of soft deleted resources.
     */
    public function softDeleted()
    {
        $projects = Project::onlyTrashed()->paginate(15);
        return view('admin.projects.softDeleted', compact('projects'));
    }

    /**
     * Restore a soft deleted resource.
     */
    public function restore(string $id)
    {
        $project = Project::onlyTrashed()->findOrFail($id);
        $project->restore();
        return redirect()->route('admin.projects.deleted', compact('id'))->with('message', $project['title'] . ' has been restored');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function hardDelete(string $id)
    {
        $project = Project::onlyTrashed()->findOrFail($id);
        $project->technologies()->detach();
        $project->forceDelete();
        return redirect()->route('admin.projects.deleted', compact('id'))->with('message', $project['title'] . ' has been permanently deleted');
    }
}
