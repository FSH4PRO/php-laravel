  <x-app-layout>
      <form action="{{ route('project.update', $project->id) }}" method="post">
          @csrf
          @method('PUT')
          <label for="name">{{__('columns.name')}}:</label>
          <input type="text" name="name" id="name" placeholder="Enter a name:"
              value="{{ old('name', $project->name) }}">
          @error('name')
              {{ $message }}
          @enderror
          <br><br>
          <button type="submit">{{__('buttons.update_project')}}</button>
          
      </form>

      <table class="table">
          <thead>
              <tr>
                  <th scope="col">#</th>
                  <th scope="col">{{__('columns.task_title')}}</th>
                  <th scope="col">{{__('columns.task_description')}}</th>
                  <th scope="col">{{__('columns.assigned_to')}}</th>
                  <th scope="col" style="text-align: center;">{{__('columns.actions')}}</th>
                  


              </tr>
          </thead>
          <tbody>
              @foreach ($project->tasks as $task)
                  <tr>
                      <td>{{ $task->id }}</td>
                      <td>{{ $task->title }}</td>
                      <td>{{ $task->description }}</td>
                      <td>{{ $task->assigned_to}}</td>
                      <td style="width: 290px;">
                        <button><a href="{{ route('task.edit', $task->id) }}">{{__('buttons.edit')}}</a></button>
                        <form action="{{ route('task.destroy', $task->id) }}" method="post" style="display: inline">
                            @csrf
                            @method('delete')
                            <button type="submit">{{__('buttons.delete')}}</button>
                        </form>
                    </td>
                      
                      
                  </tr>
              @endforeach



          </tbody>
      </table>
      <br>
      <button><a href="{{ route('project.index') }}">{{__('buttons.back')}}</a></button>
  </x-app-layout>
