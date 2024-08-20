<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        // ! return a JSON as the API response
        // $projects = Project::all(); // # eager loading
        $projects = Project::orderBy('date', 'desc')->paginate(25); // <-- lazy loading

        return response()->json([
            "success" => "true",
            "results" => $projects
        ]);
    }

    public function show(Project $project){

    }
}
