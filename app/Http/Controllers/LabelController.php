<?php

namespace App\Http\Controllers;

use App\Models\Label;
use Illuminate\Http\Request;
use App\Services\LabelService;
use App\Http\Requests\LabelRequest;
use App\Http\Requests\StoreLabelRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Requests\UpdateLabelRequest;

class LabelController extends Controller
{
    protected $labelService;

    public function __construct(LabelService $labelService)
    {
        $this->labelService = $labelService;
    }

    public function index()
    {
        $labels = $this->labelService->getAll();
        return view('label.index', compact('labels'));
    }

    public function create()
    {
        return view('label.create');
    }

    public function store(StoreLabelRequest $request)
    {
        $this->labelService->create($request->validated());
        return redirect()->route('label.index')->with('success',__('message.label_created'));
    }

    public function show(string $id)
    {
        $label = $this->labelService->findById($id);
        $tasks = $label->tasks()->with('user')->get();
        return view('label.show', compact('label', 'tasks'));
    }

    public function edit(string $id)
    {
        $label = $this->labelService->findById($id);
        return view('label.edit', compact('label'));
    }

    public function update(UpdateLabelRequest $request, string $id)
    {
        $this->labelService->update($id, $request->validated());
        return redirect()->route('label.index')->with('success', __('message.label_updated'));
    }

    public function destroy(string $id)
    {
        $this->labelService->delete($id);
        return redirect()->route('label.index')->with('success', __('message.label_deleted'));
    }
}
