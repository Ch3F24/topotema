<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('assets')
    @vite('resources/css/app.css')
</head>
<body @class(["home" => route('home')]) data-bg="1">
    <header class="lg:container px-4">
        <nav class="flex pt-4 pb-12 lg:py-8">
            <div class="lg:w-3/12 mr-4">
                <a href="/">
                    <img src="{{ asset('assets/images/logo.svg') }}" alt="Topotéma logó" class="logo">
                </a>
            </div>
            <ul class="flex-1 flex space-x-2 text-white justify-end lg:items-center mr-4 md:mr-8 ml-auto text-lg">
                <li>En</li>
                <li>|</li>
                <li>Hu</li>
            </ul>
            <div class="">
                <a href="https://www.abtl.hu/">
                    <img src="{{ asset('assets/images/abtl_logo.svg') }}" alt="Abtl logó" class="abtl-logo hidden lg:block">
                    <img src="{{ asset('assets/images/abtl_mono.svg') }}" alt="Abtl logó" class="abtl-logo lg:hidden ml-auto">
                </a>
            </div>
        </nav>
    </header>
    <main id="app" class="md:container flex flex-wrap gap-x-4 mb-4">
{{--    <main class="md:container flex flex-wrap gap-x-4 mb-4">--}}
        @yield('main')
    </main>
</body>
</html>
