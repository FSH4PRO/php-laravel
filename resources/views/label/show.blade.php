<x-app-layout>
    <h2>{{__('buttons.Label')}}: {{ $label->name }}</h2>

    
    <h2>{{__('buttons.Task')}}:</h2>

    <table class="table">
        <thead>
            <tr>
                 <th scope="col">#</th>
                <th scope="col">{{ __('columns.task_title') }}</th>
                <th scope="col">{{ __('columns.task_description') }}</th>
                <th scope="col">{{ __('columns.project') }}</th>
                <th scope="col">{{ __('columns.assigned_to') }}</th>
            </tr>
        </thead>
        <tbody>
            @if ($label->tasks->isEmpty())
                <p>No tasks linked.</p>
            @else
                @foreach ($label->tasks as $task)
                    <tr>
                        <th scope="row">{{ $task->id }}</th>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->project_id }}</td>
                        <td>{{ $task->user->name }}</td>
                    </tr>
                @endforeach
        </tbody>
    </table>
    @endif
</x-app-layout>
