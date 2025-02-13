@props(['focus' => false])

@php
    $class = 'bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500'
@endphp

<input type="number" {!! $attributes->merge(['class' => $class]) !!} step="any" required {{ $focus ? 'autofocus' : '' }}/>
