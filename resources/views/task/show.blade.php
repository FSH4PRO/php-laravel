<x-app-layout>
    <h2>{{__('buttons.Task')}}:</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{ __('columns.task_title') }}</th>
                <th scope="col">{{ __('columns.task_description') }}</th>
                <th scope="col">{{ __('columns.project') }}</th>
                <th scope="col">{{ __('columns.assigned_to') }}</th>
                <th scope="col">{{ __('columns.label_name') }}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $task->id }}</td>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->project_id }}</td>
                <td>{{ $task->assigned_to }}</td>
                <td>@foreach ($task->labels as $label)
                    {{ $label->name }}
                    
                @endforeach</td>
            </tr>
        </tbody>
    </table>
    <br><br><br>
</x-app-layout>
