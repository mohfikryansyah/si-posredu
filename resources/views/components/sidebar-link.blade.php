@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center p-2 text-orange-400 rounded-lg dark:text-white group'
            : 'flex items-center p-2 text-gray-500 hover:text-orange-400 rounded-lg dark:text-white group transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>