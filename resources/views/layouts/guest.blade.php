<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="icon" href="{{asset('images/icon.png')}}" sizes="16x16" type="image/png">
        <link rel="icon" href="{{asset('images/icon.png')}}" sizes="32x32" type="image/png">
        <link rel="icon" href="{{asset('images/icon.png')}}" sizes="96x96" type="image/png">
        <link rel="icon" href="{{asset('images/icon.png')}}" sizes="180x180" type="image/png">

        <link rel="apple-touch-icon" href="{{asset('images/logo-cuadrado.png')}}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{asset('images/logo-cuadrado.png')}}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{asset('images/logo-cuadrado.png')}}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('images/logo-cuadrado.png')}}">

        <title>@yield('title') - Geomatrix</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="@yield('description')">
        <meta name="keywords" content="@yield('keywords')">

        <meta property="og:description" content="@yield('description')" />
        <meta property="og:title" content="@yield('title')" />
        <meta property="og:url" content="https://ardemti.com" />
        <meta property="og:type" content="website" />
        <meta property="og:locale" content="{{ app()->getLocale() }}" />
        <meta property="og:locale:alternate" content="es_ES" />
        <meta property="og:site_name" content="ardemti" />
        <meta property="og:image" content="@yield('og-image')" />

        <!-- Fonts -->
        {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Acme&family=Anton&family=Courgette&family=Kaushan+Script&family=Lobster&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

        <!-- Styles -->
        @livewireStyles
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>

    </head>
    <body class="font-sans antialiased bg-[#f7f7f7]">
        {{-- <div class="flex justify-center py-4">
            <img class="h-32" src="{{ asset('images/logo-circle.png') }}" alt="Ardenti Logo">
        </div> --}}
        <x-jet-banner />

        <div class="min-h-screen">
            @livewire('guest-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        
        <footer class="p-4 bg-white rounded-lg shadow md:flex md:items-center md:justify-between md:p-6 border-t">
            <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© {{ now()->year }} Geomatrix - {{ __('All Rights Reserved') }}.
            </span>
            <ul class="flex flex-wrap items-center mt-3 text-sm text-gray-500 dark:text-gray-400 sm:mt-0">
                <li>
                    <a href="{{ route('about') }}" class="mr-4 hover:underline md:mr-6 ">{{ __('Acerca de la Companía') }}</a>
                </li>
                <li>
                    <a href="{{ route('contact-us') }}" class="mr-4 hover:underline md:mr-6">{{ __('Contáctanos') }}</a>
                </li>
                {{-- <li>
                    <a href="#" class="mr-4 hover:underline md:mr-6">{{ __('Terms & Conditions') }}</a>
                </li>
                <li>
                    <a href="#" class="hover:underline">{{ __('Cookies') }}</a>
                </li> --}}
            </ul>
        </footer>


        @stack('modals')

        @livewireScripts
    </body>
</html>
