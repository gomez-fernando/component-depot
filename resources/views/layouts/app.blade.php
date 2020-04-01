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
<link href="{{asset('lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

  {{-- <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- favicoon -->
    <link rel="shortout icon" type="image/png" href="{{ asset('img/favicon.png') }}">

{{--    js barratings--}}
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

        <nav id="header-02" class="navbar navbar-expand-md header-02 navbar-light">
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
                        <div class="col-5  ">

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
                                <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>

                                <div class="collapse navbar-collapse" id="navbarSupportedContent2">
                                        <ul class="navbar-nav ml-auto" id="marginlf">
<li class="nav-item ml-auto" >
    <a class="nav-link" id="inicio" href="{{ route('home') }}" ><strong>{{ __('lang.home') }} &nbsp;</strong></a>

</li>


                                <li class="nav dropdown float-right">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle ml-auto" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            <strong>{{ Auth::user()->nick }}</strong> <span class="caret"></span>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

{{--                                            <a class="dropdown-item" href="{{ route('home') }}" class="nav-link">{{ __('lang.home') }}</a>--}}

                                @if (Auth::user() && Auth::user()->role == 'user')
                                        <a class="dropdown-item" href="{{ route('likes') }}" class="nav-link">{{ __('lang.favorites') }}</a>
                                @endif



                                            @if (Auth::user() && Auth::user()->role == 'admin')
                                                <a href="{{ route('component.create') }}" class="dropdown-item">{{ __('lang.upload_component') }}</a>
                                                <a href="{{ route('category.list') }}" class="dropdown-item">Categorias</a>
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
                                </ul>
                                </div>
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

                            <a class="nav-link" href="{{ route('home') }}" class="nav-link">{{ __('lang.home') }}</a>


                            <li class="nav dropdown float-right">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <strong>Bienvenido/a &nbsp; {{ Auth::user()->nick }}</strong> <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

{{--                                    <a class="dropdown-item" href="{{ route('home') }}" class="nav-link">{{ __('lang.home') }}</a>--}}

                                    @if (Auth::user() && Auth::user()->role == 'user')
                                        <a class="dropdown-item" href="{{ route('likes') }}" class="nav-link">{{ __('lang.favorites') }}</a>
                                    @endif



                                    @if (Auth::user() && Auth::user()->role == 'admin')
                                        <a href="{{ route('component.create') }}" class="dropdown-item">{{ __('lang.upload_component') }}</a>
                                        <a href="{{ route('category.list') }}" class="dropdown-item">Categorias</a>
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
        <div id="margin-plus" class="row">
            <!-- Grid column -->
            <div class="col-md-4 mx-auto">
                <!-- Links -->
                <h5 class="font-weight-bold text-uppercase mt-3 mb-4">componentes para pc</h5>

                <ul class="list-unstyled">
                    <li>
                        <a href="https://www.pccomponentes.com/" target="_blank"><strong>PC Componentes</strong></a>
                    </li>
                    <li>
                        <a href="https://www.worten.es/productos/informatica/pc-componentes" target="_blank"><strong>Worten</strong></a>
                    </li>
                    <li>
                        <a href="https://www.coolmod.com/componentes-hardware-componentes-pc" target="_blank"><strong>CoolMod</strong></a>
                    </li>
                </ul>
            </div>
            <!-- Grid column -->
            <hr class="clearfix w-100 d-md-none">
            <!-- Grid column -->
            <div class="col-md-4 mx-auto">
                <!-- Links -->
                <h5 class="font-weight-bold text-uppercase mt-3 mb-4">información importante</h5>

                <ul class="list-unstyled">
                    <li>
                        <a href="{{ route('terminosDeUso') }}"><strong>Términos de uso</strong></a>
                    </li>
                    <li>
                        <a href="{{ route('privacyPolicy') }}"><strong>Política de privacidad</strong></a>
                    </li>
                    <li>
                        <a href="{{ route('cookiesPolicy') }}"><strong>Política de cookies</strong></a>
                    </li>
                </ul>
            </div>
            <!-- Grid column -->
            <hr class="clearfix w-100 d-md-none">
        </div>
        <!-- Grid row -->

        <!-- Footer Links -->

        <div class="row justify-content-center redes-sociales">
            <!-- codigo de color de los iconos #2379ca -->
            <div class="col-auto">
                <a href="https://www.linkedin.com/in/gomez-fernando" target="_blank"><img src="{{ asset('img/linkedin.png') }}" alt=""></a>
            </div>
            <div class="col-auto">
                <a href="https://github.com/FernandoDavidGomezOrtega/component-depot" target="_blank"><img src="{{ asset('img/github-8-64.png') }}" alt=""></a>
            </div>
        </div>

        <hr class="clearfix w-100 d-md-none">

        <p id="copyright" class=" text-center">
            <a href="https://gomez-fernando.github.io/portfolio/" target="_blank"><strong>Developed with &#x1F49A; by: Fernando Gómez Web &copy; 2019</strong></a>
        </p>
    </div>

</footer>


</div>
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JS FontAwesome -->
  {{-- <script src="https://kit.fontawesome.com/a2e8d0339c.js"></script> --}}

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>

  <!-- Required JavaScript Libraries -->
  {{-- <script src="{{ asset('lib/jquery/jquery.min.js') }}"></script> --}}
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
