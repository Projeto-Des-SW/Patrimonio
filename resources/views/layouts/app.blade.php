<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div id="app">
    @include('layouts.components.navbar')
    @hasSection('content')
        <main class="py-4">
            <div class="row">
                @include('layouts.components.messages')
                <div class="shadow p-3 mb-5 bg-white rounded offset-2 col-8 mt-4">
                    @yield('content')
                </div>
            </div>
        </main>
    @endif

    @hasSection('dashboard')
        <main class="py-4">
            @yield('dashboard')
        </main>
    @endif
</div>
</body>
</html>
