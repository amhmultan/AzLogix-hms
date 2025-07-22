<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('img/favicon1.ico') }}">
        
        <!-- Custom Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
        <link rel="stylesheet" href="{{ asset('css/clock.css') }}">
        <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
        <link rel="stylesheet" href="{{ asset('css/prescription.css') }}">

        <!-- Bootstrap Styles Links -->
        <link href="{{ asset('bootstrap-5.1.3-dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('bootstrap-4.1.3-dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

        <!-- FontAwsome 6.2.1 Icons -->
        <link href="{{ asset('fontawesome-free-6.2.1-web/css/fontawesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('fontawesome-free-6.2.1-web/css/regular.min.css') }}" rel="stylesheet">
        <link href="{{ asset('fontawesome-free-6.2.1-web/css/solid.min.css') }}" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        <!-- Orbitron Font -->
        <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap" rel="stylesheet">
        
        <!-- JQuery Styles -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />        
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
        
        @stack('styles')

    </head>
    <body class="font-sans antialiased">
        <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">
            @include('layouts.sidebar')
            
            <div class="flex-1 flex flex-col overflow-scroll">
                
                @include('layouts.header')

                {{ $slot }}

            </div>
        </div>
        
        <!-- JS Scripts -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

        <!-- Bootstrap -->
        <script src="{{ asset('bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js') }}"></script>
        
        @stack('scripts')

    </body>
</html>