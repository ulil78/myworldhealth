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
                {{-- Right Button --}}
                @include('front.partials.components.right-button')
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
    <script type="text/javascript">
        $('.slide').on('click', function(){
            $('#fade-in').toggleClass('show');
        });
    </script>
    @yield('javascript')

    <!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
(function(){ var widget_id = '1WBYXwQoPt';var d=document;var w=window;function l(){
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
<!-- {/literal} END JIVOSITE CODE -->
</body>
</html>
