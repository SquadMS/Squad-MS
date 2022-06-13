@props(['active' => false, 'disabled' => false, 'link' => '#', 'title'])

<li>
    <a {{ $attributes->merge(['class' => 'dropdown-item' . ($active ? ' active' : '') . ($disabled ? ' disabled' : '')]) }} href="{{ $link }}">{{ $title }}</a>
</li>