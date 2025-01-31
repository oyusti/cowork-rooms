@props(['breadcrumbs' => []])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/03221c46fa.js" crossorigin="anonymous"></script>
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Sweet Alert 2-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Styles -->
    @livewireStyles

    @stack('css')
</head>

<body class="font-sans antialiased sm:overflow-visible"
    :class="{
        'overflow-hidden': sidebarOpenMobile,
    }"
    x-data="{ 
        sidebarOpenMobile: false,
    }">


    @include('layouts.includes.nav')

    @include('layouts.includes.aside')

    

    <div class="p-4 sm:ml-64">

        <div class=" mt-14 -mb-10 flex justify-end items-center">

            @isset($action)
                {{ $action }}
            @endisset

        </div>
        

        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">

            {{ $slot }}

        </div>
    </div>

    <div x-show="sidebarOpenMobile"
        x-on:click="sidebarOpenMobile = false"
        style="display:none;" 
        class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-30 sm:hidden"></div>

    @stack('modals')

    @livewireScripts

    @if (session('swal'))
        <script>
            Swal.fire(@json(session('swal')))
        </script>
    @endif

    <script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>

    @stack('js')

</body>

</html>
