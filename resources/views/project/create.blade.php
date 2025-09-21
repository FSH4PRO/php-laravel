   <x-app-layout>
    <form action="{{ route('project.store') }}" method="post">
        @csrf
        <label for="name">{{__('columns.name')}}:</label>
        <input type="text" name="name" id="name" placeholder="Enter a name:">
        @error('name')
            {{ $message }}
        @enderror
        
        <button type="submit">{{__('buttons.add_project')}}</button>
        <button><a href="{{ route('project.index') }}">{{__('buttons.back')}}</a></button>
    </form>
   </x-app-layout>