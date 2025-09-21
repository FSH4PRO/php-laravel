  <x-app-layout>
      <h2>{{ __('buttons.Project') }}:</h2>
      <table class="table">
          <thead>
              <tr>
                  <th scope="col">#</th>
                  <th scope="col">{{ __('columns.name') }}</th>
                  <th scope="col">{{ __('columns.user_name') }}</th>
              </tr>
          </thead>
          <tbody>
              <tr>
                  <td>{{ $project->id }}</td>
                  <td>{{ $project->name }}</td>
                  <td>{{ $project->user_id }}</td>
              </tr>
          </tbody>
      </table>
      <br><br><br>
      <h2>{{ __('buttons.Task') }}:</h2>
      <table class="table">
          <thead>
              <tr>
                  <th scope="col">#</th>
                  <th scope="col">{{__('columns.task_title')}}</th>
                  <th scope="col">{{__('columns.task_description')}}</th>
                  <th scope="col">{{__('columns.assigned_to')}}</th>

              </tr>
          </thead>
          <tbody>
              @foreach ($project->tasks as $task)
                  <tr>
                      <td>{{ $task->id }}</td>
                      <td>{{ $task->title }}</td>
                      <td>{{ $task->description }}</td>
                      <td>{{ $task->user->name }}</td>



                  </tr>
              @endforeach



          </tbody>
      </table>
  </x-app-layout>
