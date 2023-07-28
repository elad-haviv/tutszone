<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'he' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @section('title')
            {{ config('app.name') }}
        @show
    </title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite(['resources/sass/app.scss'])
    @livewireStyles
</head>

<body class="bg-body-tertiary">
    @section('body')
        This is the master content
    @show

    @vite(['resources/js/app.js'])
    @livewireScripts
</body>

</html>
