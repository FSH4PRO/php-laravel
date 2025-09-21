<?php

namespace App\Services;

use App\Models\Label;

class LabelService
{
    public function getAll()
    {
        return Label::with('tasks')->paginate(10);
    }

    public function findById(string $id): Label
    {
        return Label::findOrFail($id);
    }

    public function create(array $data): Label
    {
        return Label::create($data);
    }

    public function update(string $id, array $data): bool
    {
        $label = $this->findById($id);
        return $label->update($data);
    }

    public function delete(string $id): ?bool
    {
        $label = $this->findById($id);
        return $label->delete();
    }
}
