   <x-app-layout>
    <form action="{{ route('label.store') }}" method="post">
        @csrf
        <label for="name">{{__('columns.name')}}:</label>
        <input type="text" name="name" id="name" placeholder="Enter a name:">
        @error('name')
            {{ $message }}
        @enderror
        
        <button type="submit">{{__('buttons.add_label')}}</button>
        <button><a href="{{ route('label.index') }}">{{__('buttons.back')}}</a></button>
    </form>
   </x-app-layout>