<?php
ob_start();
?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

@yield('title')

<!-- Scripts -->

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/main.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="{{asset('../lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('../lib/animate-css/animate.min.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- favicoon -->
    <link rel="shortout icon" type="image/png" href="{{ asset('../img/favicon-laravel-32x32.png') }}">

    {{--    js barratings--}}
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/fontawesome-stars.css') }}">
</head>
<body>
<?php  ?>

<div class="">
    <section id="welcome">


        <div class="welcome-container">
            <div id="particles-js"></div>

            <div class="wow fadeIn">

                <!-- <div class="welcome-logo">
                <img class="" src="assets/img/logo.jpg" alt="Logo INPRL">
              </div> -->

                <h1>Component Depot</h1>
                <h2><span class="rotating mt-5">Valora los productos, Participa en la comunidad, Haz tu lista de favoritos</span></h2>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="actions">
                            <a href="/" class="btn-informacion-riesgos mt-3">Inicio</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Required JavaScript Libraries -->
<script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
<script src="lib/bootstrap/js/bootstrap.min.js"></script>
<!-- <script src="lib/superfish/hoverIntent.js"></script> -->
<!-- <script src="lib/superfish/superfish.min.js"></script> -->
<script src="{{ asset('lib/morphext/morphext.min.js') }}"></script>
{{--<script src=""></script>--}}
{{--<!-- <script src="lib/wow/wow.min.js"></script>--}}
{{--<script src="lib/stickyjs/sticky.js"></script>--}}
{{--<script src="lib/easing/easing.js"></script> -->--}}

<!-- Template Specisifc Custom Javascript File -->
<script src="js/main.js"></script>
<script src="js/custom.js"></script>

<!-- JS Particles.js -->
<script src="js/particles.min.js"></script>
<script src="js/particles.js"></script>
</body>
</html>
