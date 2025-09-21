<x-app-layout>

    <button><a href="{{ route('project.create') }}">{{__('buttons.create_project')}}</button>

    </a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{__('columns.name')}}</th>
                <th scope="col">{{__('columns.user_name')}}</th>
                <th scope="col" style="width: 500px; text-align: center" >{{__('columns.actions')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->user->name }}</td>

                    <td >
                        <button><a href="{{ route('project.show', $project->id) }}">{{__('buttons.show')}}</a></button>

                        <button><a href="{{ route('project.edit', $project->id) }}">{{__('buttons.edit')}}</a></button>


                        <form action="{{ route('project.destroy', $project->id) }}" method="post" style="display: inline;" >
                            @csrf
                            @method('delete')
                            <button type="submit">{{__('buttons.delete')}}</button>
                        </form>
                    </td>



                </tr>
            @endforeach

        </tbody>
    </table>
    <div>
        {{ $projects->links() }}
    </div>

</x-app-layout>
