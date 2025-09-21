<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Services\ProjectService;
use Illuminate\Support\Facades\Redirect;

class ProjectController extends Controller
{
    private ProjectService $projectService;

    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    public function index()
    {
        $projects = $this->projectService->index();
        return view('project.index', compact('projects'));
    }

    public function create()
    {
        return view('project.create');
    }

    public function store(StoreProjectRequest $request)
    {
        $this->projectService->store($request->validated());
        return Redirect::route('project.index')->with('success', __('message.project_created'));
    }

    public function show(string $id)
    {
        $project = $this->projectService->findWithTasks($id);
        return view('project.show', compact('project'));
    }

    public function edit(string $id)
    {
        $project = $this->projectService->findWithTasks($id);
        return view('project.edit', compact('project'));
    }

    public function update(UpdateProjectRequest $request, string $id)
    {

        $project = Project::findOrFail($id);
        $this->projectService->update($project, $request->validated());
        return Redirect::route('project.index')->with('success', __('message.project_updated'));
    }

    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);
        $this->projectService->delete($project);
        return Redirect::route('project.index')->with('success', __('message.project_deleted'));
    }
}
