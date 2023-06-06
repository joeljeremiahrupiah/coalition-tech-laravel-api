<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function getAllProjects()
    {
        $projects = Project::paginate(request()->total);
        return response(["projects" => $projects, "status" => 200], 200);
    }

    public function getAllProjectsWithoutPagination()
    {
        $projects = Project::get();
        return response(["projects" => $projects, "status" => 200], 200);
    }

    public function createProject(Request $request)
    {

        $request->validate([
            'name' => 'required'
        ]);

        Project::create([
            'name' => $request->name
        ]);

        $projects = Project::get();

        return response(["projects" => $projects, "status" => 201], 201);
    }

    public function updateProject(Request $request, $id)
    {

        $project = Project::where('id', $id)->first();
        $project->name = $request->name;
        $project->save();

        $projects = Project::get();

        return response(["projects" => $projects, "status" => 200], 200);
    }

    public function deleteProject(Request $request, $id)
    {
        $project = Project::where('id', $id)->first();
        $project->delete();

        $projects = Project::get();

        return response(["projects" => $projects, "status" => 200], 200);
    }
}
