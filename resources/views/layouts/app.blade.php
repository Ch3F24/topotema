<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('meta')

    @vite('resources/css/app.css')
</head>

<body @class([Route::currentRouteName()]) data-bg="1">

    <header class="lg:container px-4">

        @include('partials._navigation')

    </header>

    <main id="app" class="md:container flex flex-wrap gap-x-4 mb-4 overflow-y-auto">

        @yield('main')

    </main>

    @yield('assets')

</body>

</html>
