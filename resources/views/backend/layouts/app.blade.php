<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Kazi stock</title>

    <!-- Favicon -->
    {{-- <link rel="shortcut icon" href="https://templates.iqonic.design/posdash/html/assets/images/favicon.ico" /> --}}
    <link rel="stylesheet" href="{{ asset('assets') }}/css/backend-plugin.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/backende209.css?v=1.0.0">
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets') }}/vendor/%40fortawesome/fontawesome-free/css/all.min.css"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets') }}/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css"> --}}
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/remixicon/fonts/remixicon.css">

</head>
    <body class="  ">
        <!-- loader Start -->
        <div id="loading">
            <div id="loading-center">
            </div>
        </div>
        <!-- loader END -->
        <!-- Wrapper Start -->
        <div class="wrapper">

            @include('backend.includes.sidebar')

            @include('backend.includes.header')

            @yield('content')

            @include('backend.includes.footer')
            <!-- Backend Bundle JavaScript -->
            <script src="{{ asset('assets') }}/js/backend-bundle.min.js"></script>

            <!-- Table Treeview JavaScript -->
            <script src="{{ asset('assets') }}/js/table-treeview.js"></script>

            <!-- Chart Custom JavaScript -->
            <script src="{{ asset('assets') }}/js/customizer.js"></script>

            <!-- Chart Custom JavaScript -->
            <script async src="{{ asset('assets') }}/js/chart-custom.js"></script>

            <!-- app JavaScript -->
            <script src="{{ asset('assets') }}/js/app.js"></script>


            @include('sweetalert::alert')

            <script>
                function appendToResult(value) {
                document.getElementById("result").value += value;
            }
            </script>

             @yield('footer_script')
    </body>
</html>
