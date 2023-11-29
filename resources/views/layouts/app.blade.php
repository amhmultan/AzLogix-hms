<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
        
        <!-- Custom Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
        <link rel="stylesheet" href="{{ asset('css/clock.css') }}">
        <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
        <link rel="stylesheet" href="{{ asset('css/prescription.css') }}">

        <!-- Bootstrap Styles Links -->
        <link href="{{ asset('bootstrap-5.1.3-dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('bootstrap-4.1.3-dist/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- FontAwsome 6.2.1 Icons -->
        <link href="{{ asset('fontawesome-free-6.2.1-web/css/fontawesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('fontawesome-free-6.2.1-web/css/regular.min.css') }}" rel="stylesheet">
        <link href="{{ asset('fontawesome-free-6.2.1-web/css/solid.min.css') }}" rel="stylesheet">
        
        <!-- JQuery Styles -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />        
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
        
    </head>
    <body class="font-sans antialiased">
        <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">
            @include('layouts.sidebar')
            
            <div class="flex-1 flex flex-col overflow-scroll">
                
                @include('layouts.header')
                
                
                {{ $slot }}

                    

                    
            </div>
        </div>
        
        <!-- Custom Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/clock.js') }}" defer></script>
        
        <!-- Bootstrap Scripts -->
        <script src="{{ asset('bootstrap-4.1.3-dist/js/bootstrap.bundle.min.js') }}" defer></script>
        <script src="{{ asset('bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js') }}" defer></script>
        
        <!-- JS Scripts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src ="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
        
        @yield('script')

    </body>
</html>