<!DOCTYPE html>
{{-- {{ str_replace('_', '-', app()->getLocale()) }} --}}
<html lang="he" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite(['resources/sass/app.scss'])
    @livewireStyles
</head>

<body class="bg-body-tertiary">
    <header>
        <x-topbar />
    </header>
    <main>
        @section('content')
            This is the master content
        @show
    </main>
    <footer class="text-center bg-dark text-bg-dark p-3">
        <small>All rights reserved &copy; 2010-2023</small>
    </footer>
    @vite(['resources/js/app.js'])
    @livewireScripts
</body>

</html>
