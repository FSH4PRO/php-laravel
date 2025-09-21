<x-app-layout>
    <form action="{{ route('task.update', $task->id) }}" method="post">
        @csrf
        @method('PUT')
        <label for="title">{{ __('columns.task_title') }}:</label>
        <input type="text" name="title" id="title" placeholder="Enter a title:"
            value="{{ old('title', $task->title) }}">
        @error('title')
            {{ $message }}
        @enderror
        <br><br>
        <label for="description">{{ __('columns.task_description') }}:</label>
        <input type="text" name="description" id="description" placeholder="Enter a description:"
            value="{{ old('description', $task->description) }}">
        @error('description')
            {{ $message }}
        @enderror
        <br><br>
        <label for="assigned_to">{{ __('columns.assigned_to') }}:</label>
        <select name="assigned_to" id="assigned_to">
            @foreach ($users as $user)
                <option value="{{ $user->id }}"> {{ $user->name }} </option>
            @endforeach
        </select>
        @error('asigned_to')
            {{ $message }}
        @enderror
        <br><br>
        <label for="project_id">{{ __('columns.project') }}:</label>
        <select name="project_id" id="project_id">
            @foreach ($projects as $project)
                <option value="{{ $project->id }}"> {{ $project->name }} </option>
            @endforeach
        </select>
        @error('project_id')
            {{ $message }}
        @enderror
        <br><br>

        <label>{{ __('columns.label_name') }}:</label>
        <select name="labels[]" multiple>
            @foreach ($labels as $label)
                <option value="{{ $label->id }}" @if ($task->labels->contains($label->id)) selected @endif>
                    {{ $label->name }}
                </option>
            @endforeach
        </select>
        </div>
        <br><br>
        <button type="submit">{{__('buttons.update_task')}}</button>
    </form>
</x-app-layout>
