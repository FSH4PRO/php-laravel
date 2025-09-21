<x-app-layout>
    <button><a href="{{ route('task.create') }}">{{ __('buttons.create_task') }}</a></button>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{ __('columns.task_title') }}</th>
                <th scope="col">{{ __('columns.task_description') }}</th>
                <th scope="col">{{ __('columns.project') }}</th>
                <th scope="col">{{ __('columns.assigned_to') }}</th>
                <th scope="col">{{ __('columns.label_name') }}</th>
                <th scope="col" style="text-align: center">{{ __('columns.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->project_id }}</td>
                    <td>{{ $task->user?->name }}</td>
                    <td>
                        @foreach ($task->labels as $label)
                            {{ $label->name }}
                        @endforeach
                    </td>
                    <td style="text-align: center">
                        <button><a href="{{ route('task.show', $task->id) }}">{{ __('buttons.show') }}</a></button>
                        <button><a href="{{ route('task.edit', $task->id) }}">{{ __('buttons.edit') }}</a></button>
                        <form action="{{ route('task.destroy', $task->id) }}" method="post" style="display: inline">
                            @csrf
                            @method('delete')
                            <button type="submit">{{ __('buttons.delete') }}</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</x-app-layout>
