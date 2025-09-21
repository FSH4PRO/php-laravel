<x-app-layout>
    {{-- @can('manage-labels') --}}
        <button><a href="{{ route('label.create') }}">{{ __('buttons.create_label') }}</a></button>
    {{-- @endcan --}}
    </a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{__('columns.name')}}</th>
                <th scope="col" style="width: 400px; text-align: center">{{__('columns.actions')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($labels as $label)
                <tr>
                    <td>{{ $label->id }}</td>
                    <td>{{ $label->name }}</td>
                    <td>
                        <button><a href="{{ route('label.show', $label->id) }}">{{ __('buttons.show') }}</a></button>
                        {{-- @can('manage-labels') --}}
                            <button><a href="{{ route('label.edit', $label->id) }}">{{ __('buttons.edit') }}</a></button>
                        {{-- @endcan --}}

                        {{-- @can('delete-labels') --}}
                            <form action="{{ route('label.destroy', $label->id) }}" method="post" style="display: inline">
                                @csrf
                                @method('delete')
                                <button type="submit">{{ __('buttons.delete') }}</button>
                            </form>
                        {{-- @endcan --}}
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <div>
        {{ $labels->links() }}
    </div>

</x-app-layout>
