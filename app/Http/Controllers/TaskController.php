<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use App\Models\User;
use App\Models\Label;
use App\Services\TaskService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TaskController extends Controller
{
    private TaskService $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index()
    {
        $tasks = $this->taskService->index();
        return view('task.index', compact('tasks'));
    }

    public function create()
    {
        $users = User::all();
        $projects = Auth::user()->projects()->get();
        $labels = Label::all();
        return view('task.create', compact(['projects', 'labels', 'users']));
    }

    public function store(StoreTaskRequest $request)
    {
        $this->taskService->store($request->validated());
        return Redirect::route('task.index')->with('success', __('message.task_created'));
    }

    public function show(string $id)
    {
        $task = Task::with(['user', 'project', 'labels'])->findOrFail($id);
        return view('task.show', compact('task'));
    }

    public function edit(string $id)
    {
        $task = Task::with('labels')->findOrFail($id);
        $projects = Auth::user()->projects()->get();
        $labels = Label::all();
        $users = User::all();
        return view('task.edit', compact(['task', 'projects', 'labels', 'users']));
    }

    public function update(UpdateTaskRequest $request, string $id)
    {
        $task = Task::findOrFail($id);
        $this->taskService->update($task, $request->validated());
        return Redirect::route('task.index')->with('success', __('message.task_updated'));
    }

    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $this->taskService->delete($task);
        return Redirect::route('task.index')->with('success', __('message.task_deleted'));
    }
}
