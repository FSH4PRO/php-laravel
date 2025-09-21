<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Task;

class TaskPolicy
{
    public function view(User $user, Task $task)
    {
        return $user->role === 'admin' || $task->assigned_to === $user->id;
    }

    public function update(User $user, Task $task)
    {
        return $user->role === 'admin';
    }

    public function delete(User $user, Task $task)
    {
        return $user->role === 'admin';
    }

    public function create(User $user)
    {
        return $user->role === 'admin' || $user->role === 'manager';
    }
}
