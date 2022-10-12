<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
            integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
            crossorigin=""></script>
    <script type="text/javascript" src="http://maps.stamen.com/js/tile.stamen.js?v1.3.0"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
{{--    <script type="text/javascript" src="@/resources/js/stamen.js"></script>--}}
{{--    @vite('resources/js/stamen.js')--}}
    @vite('resources/js/app.js')
    @vite('resources/css/app.css')
</head>
<body>
    <header class="lg:container px-4">
        <nav class="flex pt-4 pb-12 lg:py-8">
{{--            <div class="lg:w-1/4 mr-4">--}}
            <div class="lg:w-3/12 mr-4">
                <a href="/">
                    <img src="{{ asset('assets/images/logo.svg') }}" alt="Topotéma logó" class="logo">
                </a>
            </div>
{{--            <div class="lg:w-7/12 flex ml-auto items-center">--}}
{{--                <div >--}}
{{--                    <a href="https://www.abtl.hu/">--}}
{{--                        <img src="{{ asset('assets/images/abtl_logo.svg') }}" alt="Abtl logó" class="abtl-logo hidden lg:block">--}}
{{--                        <img src="{{ asset('assets/images/abtl_mono.svg') }}" alt="Abtl logó" class="abtl-logo lg:hidden ml-auto">--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                <ul class="flex-1 flex space-x-2 text-white justify-end lg:items-center">--}}
{{--                    <li>En</li>--}}
{{--                    <li>|</li>--}}
{{--                    <li>Hu</li>--}}
{{--                </ul>--}}
{{--            </div>--}}
            <div class="flex-1 lg:flex-none mr-4 ml-auto">
                <a href="https://www.abtl.hu/">
                    <img src="{{ asset('assets/images/abtl_logo.svg') }}" alt="Abtl logó" class="abtl-logo hidden lg:block">
                    <img src="{{ asset('assets/images/abtl_mono.svg') }}" alt="Abtl logó" class="abtl-logo lg:hidden ml-auto">
                </a>
            </div>
            <ul class="lg:flex-1 flex space-x-2 text-white justify-end lg:items-center">
                <li>En</li>
                <li>|</li>
                <li>Hu</li>
            </ul>
        </nav>
    </header>
    <main id="app" class="md:container flex flex-wrap">
        <div class="w-full lg:w-3/12">
            <categories/>
        </div>
        <div class="w-full lg:w-7/12 ml-auto order-first lg:order-none">
            <maps></maps>
        </div>
    </main>
</body>
</html>
