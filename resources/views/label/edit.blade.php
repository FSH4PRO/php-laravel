<x-app-layout>
    <form action="{{ route('label.update', $label->id) }}" method="post">
        @csrf
        @method('PUT')
        <label for="title">{{__('columns.name')}}:</label>
        <input type="text" name="name" id="name" placeholder="Enter a name:"
            value="{{ old('name', $label->name) }}">
        @error('name')
            {{ $message }}
        @enderror

        <br><br>
        <button type="submit">{{__('buttons.update_label')}}</button>
    </form>
</x-app-layout>