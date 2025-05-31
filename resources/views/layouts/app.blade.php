<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <title>PinjamRuang | @yield('title')</title>
    @include('layouts.style')
    @livewireStyles

</head>

<body>
    @include('layouts.navbar')

    <main>
        @yield('content')
    </main>

    @include('layouts.footer')

    @include('layouts.script')
    @livewireScripts
    @stack('scripts')
</body>

</html>
