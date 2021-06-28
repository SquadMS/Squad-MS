<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'SquadMS') }}</title>

        @websocketToken

        <!-- CSRF -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        @livewireStyles
        <link href="{{ mix('css/admin/app.css', 'themes/sqms-foundation') }}" rel="stylesheet">
        @stack('styles')

        <!-- Important Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    </head>

    <body class="min-vh-100 d-flex flex-column bg-light">
        <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="{{ route(config('sqms.routes.def.admin-dashboard.name')) }}">
                <img src="https://squadms.com/img/logo-white.svg" alt="SquadMS Logo" class="img-fluid" style="height: 1.75em;">
            </a>
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="navbar-nav me-auto px-3 d-none d-md-flex">
                <x-sqms-foundation::navigation.item class="nav-item text-nowrap" :link="route(config('sqms.routes.def.home.name'))" title="Back to Website"/>
            </ul>
        </header>

        <div class="container-fluid">
            <div class="row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse bg-light">
                    <div class="position-sticky pt-3">
                        @foreach (\SquadMSAdminMenu::retrieve() as $menu)
                            @php
                                $m = \SquadMSMenu::getMenu($menu); 
                            @endphp
                            @if ($m->count())
                                {!! $m->setWrapperTag('ul')->addClass('nav')->addClass('flex-column')->render() !!}
                            @endif
                        @endforeach

                        <ul class="nav flex-column d-md-none">
                            <x-sqms-foundation::navigation.item class="nav-item text-nowrap" :link="route(config('sqms.routes.def.home.name'))" title="Back to Website"/>
                        </ul>
                    </div>
                </nav>

                <div class="col-md-9 col-lg-10 ms-sm-auto px-0">
                    <main class="px-md-4 py-4 bg-white" role="main">
                        @yield('content')
                    </main>

                    @include('sqms-foundation::admin.structure.footer')
                </div>
                
            </div>
        </div>    

        <!-- Scripts -->
        @livewireScripts
        <script src="{{ mix('js/admin/app.js', 'themes/sqms-foundation') }}"></script>
        <script src="{{ mix('js/echo.js',) }}"></script>
        @stack('scripts')
    </body>
</html>
