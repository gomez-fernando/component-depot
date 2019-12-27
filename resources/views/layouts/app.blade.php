<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
{{--<link href="{{ asset('../lib/animate-css/animate.min.css') }}" rel="stylesheet">--}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- favicoon -->
    <link rel="shortout icon" type="image/png" href="{{ asset('img/favicon.png') }}">

{{--    js barratings--}}
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/fontawesome-stars.css') }}">
</head>
<body>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<div class="with-background">
    <div id="app">
        <nav id="header-01" class="navbar navbar-expand-md header-01 navbar-light">
            <div class="container">
                <!-- Left Side Of Navbar -->
                    <div id="logo" class="">
                        <a href="/" title="Inicio"><img src="{{ asset('img/logoCD.png') }}" alt="" /></a>
                    </div>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">

                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ml-auto">
                                @if(isset($categories))
                                    @foreach ($categories as $category)
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('home', ['categoryId' =>$category->id]) }}">{{ $category->name }}</a>
                                        </li>
                                    @endforeach
                                @endif

                            </ul>
                        </div>

            </div>
        </nav>

{{--        @include('includes.header', ['categories' => $categories])--}}

        <nav id="header-02" class="navbar navbar-expand-md header-02">
            <div class="container">
                <div class="row w-100 m-auto">
                        <div class="col-3 a pt-2 pb-2 pl-1 pr-1"><strong><?php echo date("d M Y");?></strong></div>

                        <div class="col-4">

                              {{--                    formulario del buscador de componentes--}}
            <form method="get" action="{{ route('component.componentsSearchResult') }}" id="componentsSearch">
                    <input type="text" id="search" class="form-control" required>
                    <input type="submit" value="Buscar">
                </form>
                        </div>
                        <div class="col-5 b ">

                                <!-- Right Side Of Navbar -->
                                    <!-- Authentication Links -->
                                    @guest
                                        <li class="nav dropdown float-right">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle pt-2 pb-2 pl-1 pr-1" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                <span class="sm-hidden"><strong>Area personal</strong></span>  <span class="caret"></span>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">



                                                <a class="dropdown-item" href="{{ route('login') }}">
                                                    {{ __('lang.login') }}
                                                </a>

                                                <a class="dropdown-item" href="{{ route('register') }}">
                                                    {{ __('lang.register') }}
                                                </a>


                                            </div>
                                        </li>
                                    @else

                                    <li class="nav dropdown float-right">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            <strong>Bienvenido/a {{ Auth::user()->nick }}</strong> <span class="caret"></span>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                            <a class="dropdown-item" href="{{ route('home') }}" class="nav-link">{{ __('lang.home') }}</a>

                                @if (Auth::user() && Auth::user()->role == 'user')
                                        <a class="dropdown-item" href="{{ route('likes') }}" class="nav-link">{{ __('lang.favorites') }}</a>
                                @endif



                                            @if (Auth::user() && Auth::user()->role == 'admin')
                                                <a href="{{ route('component.create') }}" class="dropdown-item">{{ __('lang.upload_component') }}</a>
                                                <a href="{{ route('user.list') }}" class="dropdown-item">{{ __('lang.users') }}</a>
                                            @endif

                                            <a class="dropdown-item" href="{{ route('config') }}">
                                                {{ __('lang.profile') }}
                                            </a>

                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                {{ __('lang.logout') }}
                                            </a>


                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>

                                        </div>
                                    </li>




                                    <li class="nav float-right">
                                    </li>

                                    @endguest
                                {{-- </ul> --}}
                        </div>
                </div>

            </div>
        </nav>

        <nav id="header-03" class="navbar navbar-expand-md header-02">
            <div class="container">
                <div class="row w-100 m-auto">
                    <div class="col-6 a pt-2 pl-1 pr-1">
                        <form method="get" action="{{ route('component.componentsSearchResult') }}" id="componentsSearch">
                            <input type="text" id="search" class="form-control" required>
                            <input type="submit" value="Buscar">
                        </form>
                    </div>
                    <div class="col-6 a pt-2 pl-1 pr-1">
                        @guest
                            <li class="nav dropdown float-right">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle pt-2 pb-2 pl-1 pr-1" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <span class="sm-hidden"><strong>Area personal</strong></span>  <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">



                                    <a class="dropdown-item" href="{{ route('login') }}">
                                        {{ __('lang.login') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('register') }}">
                                        {{ __('lang.register') }}
                                    </a>


                                </div>
                            </li>
                        @else

                            <li class="nav dropdown float-right">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <strong>Bienvenido/a {{ Auth::user()->nick }}</strong> <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ route('home') }}" class="nav-link">{{ __('lang.home') }}</a>

                                    @if (Auth::user() && Auth::user()->role == 'user')
                                        <a class="dropdown-item" href="{{ route('likes') }}" class="nav-link">{{ __('lang.favorites') }}</a>
                                    @endif



                                    @if (Auth::user() && Auth::user()->role == 'admin')
                                        <a href="{{ route('component.create') }}" class="dropdown-item">{{ __('lang.upload_component') }}</a>
                                        <a href="{{ route('user.list') }}" class="dropdown-item">{{ __('lang.users') }}</a>
                                    @endif

                                    <a class="dropdown-item" href="{{ route('config') }}">
                                        {{ __('lang.profile') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                        {{ __('lang.logout') }}
                                    </a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                </div>
                            </li>




                            <li class="nav float-right">
                            </li>

                        @endguest
                    </div>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

         <!--==========================
  Footer
============================-->

<footer id="footer" >
    <!-- Footer Links -->
    <div class="container text-center text-md-left">

        <!-- Grid row -->
        <div class="row">


            <!-- Grid column -->
            <div class="col-md-4 mx-auto">

                <!-- Links -->
                <h5 class="font-weight-bold text-uppercase mt-3 mb-4">componentes para pc</h5>

                <ul class="list-unstyled">
                    <li>
                        <a href="https://www.pccomponentes.com/" target="_blank">PC Componentes</a>
                    </li>
                    <li>
                        <a href="https://www.worten.es/productos/informatica/pc-componentes" target="_blank">Worten</a>
                    </li>
                    <li>
                        <a href="https://www.coolmod.com/componentes-hardware-componentes-pc" target="_blank">CoolMod</a>
                    </li>
                </ul>

            </div>
            <!-- Grid column -->


            <hr class="clearfix w-100 d-md-none">

            <!-- Grid column -->
            <div class="col-md-4 mx-auto">

                <!-- Links -->
                <h5 class="font-weight-bold text-uppercase mt-3 mb-4">INFORMACIÓN IMPORTANTE</h5>

                <ul class="list-unstyled">
                    <li>
                        <a href="{{ route('terminosDeUso') }}">Términos de uso</a>
                    </li>
                    <li>
                        <a href="{{ route('home') }}">Política de privacidad</a>
                    </li>
                    <li>
                        <a href="{{ route('home') }}">Política de cookies</a>
                    </li>
                </ul>

            </div>
            <!-- Grid column -->


            <hr class="clearfix w-100 d-md-none">


        </div>
        <!-- Grid row -->

    </div>
    <!-- Footer Links -->

{{--    /////////////////////////////////////////////////////////////--}}

        <div class="row justify-content-center redes-sociales">
            <div class="col-auto">
            <a href="https://sites.google.com/fp.uoc.edu/grupo-jadf/presentaci%C3%B3n-del-proyecto" target="_blank"><img src="{{ asset('img/google-plus-3-64.png') }}" alt=""></a>
{{--                <a href="" target="_blank"><img src="{{ asset('img/youtube-3-64.png') }}" alt=""></a>--}}
                <a href="https://github.com/FernandoDavidGomezOrtega/component-depot" target="_blank"><img src="{{ asset('img/github-8-64.png') }}" alt=""></a>
            </div>
            </div>

            <div class="row ">
            <div class="col-12" id="">
                <p>
                    <strong>Developed by: Grupo JDAF - UOC 2019 &copy;</strong>
                </p>
            </div>
        </div>
</footer>


</div>
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- Required JavaScript Libraries -->
  <script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('lib/morphext/morphext.min.js') }}"></script>
 <script src="{{ asset('lib/easing/easing.js') }}"></script>


</div>

<script>
// Resaltar enlace de la categoría seleccionada
if(window.location.href.indexOf("/home/") > -1) {
    url = window.location.href;
    n = url.substr(url.length - 1);
    $('.header-01 .nav-item:nth-child('+n+')').find('.nav-link').addClass('selected');
    // Title con el nombre de la categoria
    title = $('.header-01 .nav-link.selected').text();
    document.title=title;
}
</script>
</body>

</html>
