@props(['disabled' => false, 'id' => null, 'name' => null, 'value' => null, 'checked' => false])

<input
    type="checkbox"
    {{ $disabled ? 'disabled' : '' }}
    {!! $attributes->merge([
        'id' => $id,
        'name' => $name,
        'value' => $value,
        'class' => 'rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500',
    ]) !!}
    @if($checked) checked @endif
/>