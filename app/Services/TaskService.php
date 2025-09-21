<?php

namespace App\Services;

use App\Models\Task;

class TaskService
{
    public function index()
    {
        return Task::with(['user', 'project', 'labels'])->get();
    }

    public function store(array $data): Task
    {
        $task = Task::create([
            'title'       => $data['title'],
            'description' => $data['description'] ?? null,
            'project_id'  => $data['project_id'],
            'assigned_to' => $data['assigned_to'] ?? null,
        ]);

        if (!empty($data['labels'])) {
            $task->labels()->sync($data['labels']);
        }

        return $task;
    }

    public function update(Task $task, array $data): Task
    {
        $task->update([
            'title'       => $data['title'],
            'description' => $data['description'] ?? null,
            'project_id'  => $data['project_id'],
            'assigned_to' => $data['assigned_to'] ?? null,
        ]);

        $task->labels()->sync($data['labels'] ?? []);

        return $task;
    }

    public function delete(Task $task): void
    {
        $task->delete();
    }
}
