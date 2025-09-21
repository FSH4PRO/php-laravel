<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Project;

class ProjectPolicy
{
    public function view(User $user, Project $project)
    {
        return $user->role === 'admin' || $project->user_id === $user->id;
    }

    public function update(User $user, Project $project)
    {
        return $user->role === 'admin' || $project->user_id === $user->id;
    }

    public function delete(User $user, Project $project)
    {
        return $user->role === 'admin' || $project->user_id === $user->id;
    }

    public function create(User $user)
    {
        return $user->role === 'admin' || $user->role === 'user';
    }
}
