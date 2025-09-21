<?php

namespace App\Services;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class ProjectService
{
    public function index(int $perPage = 10)
    {
        return Project::with('user')->paginate($perPage);
    }

    public function store(array $data): Project
    {
        $data['user_id'] = Auth::id();
        return Project::create($data);
    }

    public function findWithTasks(string $id): Project
    {
        return Project::with('tasks.user')->where('id', $id)->firstOrFail();
    }

    public function update(Project $project, array $data): Project
    {
        $project->update($data);
        return $project;
    }

    public function delete(Project $project): void
    {
        $project->delete();
    }
}
