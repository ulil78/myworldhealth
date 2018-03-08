<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MyWorldHealth') }}</title>

    <!-- Styles -->
    @include('front.partials.assets.css')
    {{-- // --}}
    @include('front.partials.custom-style')
</head>
<body>
    <div id="app">
        <div id="wrapper">
        <!-- Sidebar -->
        @include('front.partials.components.sidebar')
            <!-- /#sidebar-wrapper -->
            <div id="page-content-wrapper">
                <!-- Navbar -->
                @include('front.partials.components.navbar')
                <!-- Jumbotron -->
                @yield('jumbotron')
                @yield('detail-jumbotron')
                <div class="container">
                    @yield('content')
                </div>
                <!-- Footer -->
                @include('front.partials.footer')
            </div>
        </div>
        
    </div>

    <!-- Scripts -->
    @include('front.partials.assets.js')

</body>
</html>
