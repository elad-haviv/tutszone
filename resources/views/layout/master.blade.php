<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'he' ? 'rtl' : 'ltr' }}">

<head>
    @section('meta-tags')
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta name="author" content="Elad Haviv" />
    @show

    <title>
        @section('title')
            {{ config('app.name') }}
        @show
    </title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @section('fonts')
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/earlyaccess/opensanshebrew.css" />
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans" />
    @show

    @section('stylesheets')
        @vite(['resources/sass/app.scss'])
        @livewireStyles
        <link rel="icon" href="{{ url('favicon.ico') }}" />
    @show


</head>

<body class="bg-body-tertiary">
    <div id="wrapper">
        @include('layout.header')
        <div id="content" class="{{ !isset($disableContainer) ? 'uk-container uk-container-center' : '' }}">
            @yield('content')
        </div>
        <div class="push"></div>
    </div>
    @include('layout.footer')
    @section('scripts')
        @vite(['resources/js/app.js'])
        @livewireScripts
    @show
</body>

</html>
