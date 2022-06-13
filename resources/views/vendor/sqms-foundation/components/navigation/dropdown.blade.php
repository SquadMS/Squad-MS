@props(['id' => \Illuminate\Support\Str::random(40), 'alignment' => 'dropdown-menu-end', 'active' => false, 'title'])

<li {{ $attributes->merge(['class' => 'nav-item dropdown' . ($active ? ' active' : '')]) }}>
    <a class="inline-block py-2 px-4 no-underline  inline-block w-0 h-0 ml-1 align border-b-0 border-t-1 border-r-1 border-l-1" href="#" id="{{ $id }}" role="button"
        data-bs-toggle="dropdown" aria-expanded="false">
        {{ $title }}
    </a>
    <ul class=" absolute left-0 z-50 float-left hidden list-reset	 py-2 mt-1 text-base bg-white border border-gray-300 rounded {{ \LocaleHelper::isRTL(app()->getLocale()) ? ($alignment === 'dropdown-menu-end' ? 'dropdown-menu-start' : ($alignment === 'dropdown-menu-start' ? 'dropdown-menu-end' : $alignment)) : $alignment }}" aria-labelledby="{{ $id }}">
        {{ $links }}
    </ul>
</li>
