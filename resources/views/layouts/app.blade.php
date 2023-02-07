<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="icon" href="{{asset('images/favicon.png')}}" sizes="16x16" type="image/png">
        <link rel="icon" href="{{asset('images/favicon.png')}}" sizes="32x32" type="image/png">
        <link rel="icon" href="{{asset('images/favicon.png')}}" sizes="96x96" type="image/png">
        <link rel="icon" href="{{asset('images/favicon.png')}}" sizes="180x180" type="image/png">

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
        <meta property="og:url" content="https://web.geomatrixgts.com" />
        <meta property="og:type" content="website" />
        <meta property="og:locale" content="{{ app()->getLocale() }}" />
        <meta property="og:locale:alternate" content="es_ES" />
        <meta property="og:site_name" content="GeomatrixGTS" />
        <meta property="og:image" content="@yield('og-image')" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Acme&family=Anton&family=Courgette&family=Kaushan+Script&family=Lobster&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
       
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

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

        @stack('modals')

        @livewireScripts

        <script type="module">
            import mermaid from 'https://cdn.jsdelivr.net/npm/mermaid@9/dist/mermaid.esm.min.mjs';
            mermaid.initialize({ startOnLoad: true });
        </script>
    </body>
</html>
