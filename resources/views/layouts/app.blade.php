<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- CSS Google Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
        <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />

        <!-- Bootstrap 5 CDN -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
        <!-- FontAwsome 4 Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script>
            window.onload = function () {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                title:{
                    text: "Hospital Chart"
                },
                axisX:{
                    valueFormatString: "DD MMM",
                    crosshair: {
                        enabled: true,
                        snapToDataPoint: true
                    }
                },
                axisY: {
                    title: "Number of Visits",
                    includeZero: true,
                    crosshair: {
                        enabled: true
                    }
                },
                toolTip:{
                    shared:true
                },  
                legend:{
                    cursor:"pointer",
                    verticalAlign: "bottom",
                    horizontalAlign: "left",
                    dockInsidePlotArea: true,
                    itemclick: toogleDataSeries
                },
                data: [{
                    type: "line",
                    showInLegend: true,
                    name: "Total Visit",
                    markerType: "square",
                    xValueFormatString: "DD MMM, YYYY",
                    color: "#F08080",
                    dataPoints: [
                        { x: new Date(2017, 0, 3), y: 650 },
                        { x: new Date(2017, 0, 4), y: 700 },
                        { x: new Date(2017, 0, 5), y: 710 },
                        { x: new Date(2017, 0, 6), y: 658 },
                        { x: new Date(2017, 0, 7), y: 734 },
                        { x: new Date(2017, 0, 8), y: 963 },
                        { x: new Date(2017, 0, 9), y: 847 },
                        { x: new Date(2017, 0, 10), y: 853 },
                        { x: new Date(2017, 0, 11), y: 869 },
                        { x: new Date(2017, 0, 12), y: 943 },
                        { x: new Date(2017, 0, 13), y: 970 },
                        { x: new Date(2017, 0, 14), y: 869 },
                        { x: new Date(2017, 0, 15), y: 890 },
                        { x: new Date(2017, 0, 16), y: 930 }
                    ]
                },
                {
                    type: "line",
                    showInLegend: true,
                    name: "Unique Visit",
                    lineDashType: "dash",
                    dataPoints: [
                        { x: new Date(2017, 0, 3), y: 510 },
                        { x: new Date(2017, 0, 4), y: 560 },
                        { x: new Date(2017, 0, 5), y: 540 },
                        { x: new Date(2017, 0, 6), y: 558 },
                        { x: new Date(2017, 0, 7), y: 544 },
                        { x: new Date(2017, 0, 8), y: 693 },
                        { x: new Date(2017, 0, 9), y: 657 },
                        { x: new Date(2017, 0, 10), y: 663 },
                        { x: new Date(2017, 0, 11), y: 639 },
                        { x: new Date(2017, 0, 12), y: 673 },
                        { x: new Date(2017, 0, 13), y: 660 },
                        { x: new Date(2017, 0, 14), y: 562 },
                        { x: new Date(2017, 0, 15), y: 643 },
                        { x: new Date(2017, 0, 16), y: 570 }
                    ]
                },
                {
                    type: "line",
                    showInLegend: true,
                    name: "Alternate Visit",
                    lineDashType: "dash",
                    color: "#3352FF",
                    dataPoints: [
                        { x: new Date(2017, 0, 3), y: 90 },
                        { x: new Date(2017, 0, 4), y: 100 },
                        { x: new Date(2017, 0, 5), y: 80 },
                        { x: new Date(2017, 0, 6), y: 150 },
                        { x: new Date(2017, 0, 7), y: 300 },
                        { x: new Date(2017, 0, 8), y: 120 },
                        { x: new Date(2017, 0, 9), y: 350 },
                        { x: new Date(2017, 0, 10), y: 250 },
                        { x: new Date(2017, 0, 11), y: 170 },
                        { x: new Date(2017, 0, 12), y: 85 },
                        { x: new Date(2017, 0, 13), y: 65 },
                        { x: new Date(2017, 0, 14), y: 400 },
                        { x: new Date(2017, 0, 15), y: 160 },
                        { x: new Date(2017, 0, 16), y: 278 }
                    ]
                }]
            });
            chart.render();

            function toogleDataSeries(e){
                if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                    e.dataSeries.visible = false;
                } else{
                    e.dataSeries.visible = true;
                }
                chart.render();
            }

            }
        </script>
    </head>
    <body class="font-sans antialiased">
        <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">
            <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false" class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"></div>
        
            @include('layouts.sidebar')

            <div class="flex-1 flex flex-col overflow-scroll">

                    @include('layouts.header')

                    

                    {{ $slot }}
                    
            </div>
        </div>
        <!-- Scripts -->
        
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        @yield('script')
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    </body>
</html>