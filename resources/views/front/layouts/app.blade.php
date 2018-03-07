<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

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
                    <!-- Footer -->
                    @include('front.partials.footer')
                </div>

            </div>
            <nav class="navbar navbar-fixed-left navbar-minimal animate" role="navigation">
                <div class="navbar-toggler animate">
                    <span class="menu-icon"></span>
                </div>
                <ul class="navbar-menu animate">
                    <li>
                        <a href="#about-us" class="animate">
                            <span class="desc animate"> Who We Are </span>
                            <span class="ion-ios-help-outline" style="font-size: 20px;"></span>
                        </a>
                    </li>
                    <li>
                        <a href="#blog" class="animate">
                            <span class="desc animate"> What We Say </span>
                            <span class="glyphicon glyphicon-info-sign"></span>
                        </a>
                    </li>
                    <li>
                        <a href="#contact-us" class="animate">
                            <span class="desc animate"> How To Reach Us </span>
                            <span class="glyphicon glyphicon-comment"></span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        
    </div>

    <!-- Scripts -->
    @include('front.partials.assets.js')

</body>
</html>
