@props([
    'background' => null,
    'sidebarVariant' => null,
    'headerVariant' => null,
])

<x-layouts.app {{ $attributes }}>
    {{ $slot }}
</x-layouts.app>
