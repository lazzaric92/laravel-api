<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        // ! return a JSON as the API response
        // $projects = Project::with('user', 'type', 'technologies')->orderBy('date', 'desc')->all(); // # eager loading
        $projects = Project::with('user', 'type', 'technologies')->orderBy('date', 'desc')->paginate(25); // <-- lazy loading

        return response()->json([
            "success" => "true",
            "results" => $projects
        ]);
    }

    public function show(Project $project){
        // $project = Project::with('user', 'type', 'technologies')->findOrFail($id); // # using $id

        $project->loadMissing('user', 'type', 'technologies');  // <-- using dependency

        return response()->json([
            "success" => "true",
            "results" => $project
        ]);
    }
}
