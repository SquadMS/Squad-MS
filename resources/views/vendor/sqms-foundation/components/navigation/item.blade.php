@props(['active' => false, 'disabled' => false, 'link' => '#', 'onClick' => false, 'title'])

@php
    $colorClass = $active ? 'text-amber-400' : 'text-gray-700';
@endphp

<li {{ isset($attributes) ? $attributes->except(['slot'])->merge(['class' => $colorClass]) : '' }}>
    <a class="inline-block py-2 px-4 no-underline text-inherit" href="{{ is_callable($link) ? $link() : $link }}" {{ $onClick ? 'onClick="' . $onClick . '"' : ''}}>{!! $title !!}</a>
    {!! $slot ?? '' !!}
</li>
