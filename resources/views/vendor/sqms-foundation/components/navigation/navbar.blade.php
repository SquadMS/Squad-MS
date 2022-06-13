@props(['htmlBrand' => false, 'container' => 'container', 'navLeft' => false, 'navCenter' => false, 'navRight' => false, 'navExtra' => false, 'brand'])

<nav {{ $attributes->merge(['class' => 'bg-white border-b border-gray-100']) }}>
    <div class="container flex mx-auto sm:px-4">
        @if ($htmlBrand)
            <a class="inline-block pt-1 pb-1 mr-4 text-lg whitespace-no-wrap" href="{{ route(Config::get('sqms.routes.def.home.name')) }}">
                {!! $brand !!}
            </a>
        @else
            <a class="inline-block pt-1 pb-1 mr-4 text-lg whitespace-no-wrap" href="{{ route(Config::get('sqms.routes.def.home.name')) }}">{{ $brand }}</a>
        @endif

        <button class="py-1 px-2 text-md leading-normal bg-transparent border border-transparent rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="px-5 py-1 border border-gray-600 rounded"></span>
        </button>

        <div class="flex flex-grow items-center" id="navbarSupportedContent">
            @if ($navLeft)
                <!-- Left -->
                <ul class="flex flex-wrap list-none pl-0 mb-0 me-auto mb-2 lg:mb-0">
                    {{ $navLeft }}
                </ul>
            @endif

            @if ($navCenter)
                <!-- Center -->
                <ul class="flex flex-wrap list-none pl-0 mb-0 mx-auto mb-2 lg:mb-0">
                    {{ $navCenter }}
                </ul>
            @endif

            @if ($navRight)
                <!-- Right -->
                <ul class="flex flex-wrap list-none pl-0 mb-0 ms-auto mb-2 lg:mb-0">
                    {{ $navRight }}
                </ul>
            @endif

            @if ($navExtra)
                {{ $navExtra }}
            @endif
        </div>
    </div>
</nav>
