<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fonts/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
      <div class="mg-head-detail hidden-xs">
            <!-- Primer menu: Hora y redes sociales -->
                <nav class="navbar navbar-expand gr-nav-2">
                    <div class="container-fluid">
                        <a class="navbar-brand">      
                            @php 
                             use Carbon\Carbon;
                             $diaActual = Carbon::now()->translatedFormat('d \d\e F \d\e Y'); 
                             echo $diaActual
                             @endphp 
                           </a><span id="HoraActual"></span> </a>
                        <div class="" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 redes-sociales">
                            <li class="nav-item">
                                <a class="nav-link " target="_blank" href="https://es-la.facebook.com/AlcaldiaMpioPotencia">
                                    <span class="icon-soci facebook-icon">
                                        <i class="fab fa-facebook"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" target="_blank" href="https://mobile.twitter.com/alcaldiacna">
                                    <span class="icon-soci twitter-icon">
                                        <i class="fab fa-twitter"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" target="_blank" href="https://www.instagram.com/alcaldiacna/?hl=es">
                                    <span class="icon-soci instagram-icon">
                                        <i class="fab fa-instagram"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        </div>
                    </div>
                </nav>
                <!-- Header principal: imagen y titulo de la alcaldia -->
                <div class="mg-nav-widget-area-back">
                    <div class="overlay">
                        <div class="inner">
                            <div class="container-fluid">
                                <div class="mg-nav-widget-area">
                                    <div class="row align-items-center">
                                        <div class="col-lg-3 col-md-4 col-sm-6 col-11 text-center-xs">
                                            <div class="navbar-header">
                                                <div class="site-branding-text">
                                                    <h1 class="site-title">Alcaldía del Estado Sucre</h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- segundo menu: link de las diferentes vistas -->
                <nav class="navbar navbar-expand-lg navbar-wp gr-nav-1">
                    <div class="container-fluid">
                        <!--a class="navbar-brand" href="{{ url('/') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a-->
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#cumanaAlcaldias" aria-controls="cumanaAlcaldias" aria-expanded="false" aria-label="Toggle navigation">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-justify" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
                                  </svg>
                            </button>

                        <div class="collapse navbar-collapse" id="cumanaAlcaldias">
                            <!-- Left Side Of Navbar 
                            <ul class="navbar-nav me-auto">

                            </ul>
        -->
                            <!-- Right Side Of Navbar -->
                            <ul class="nav navbar-nav ">
                                <li class="nav-item ">
                                    <a class="nav-link" href="#">Bienvenidos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">¿Quiénes Somos?</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Noticias</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Gacetas Oficiales</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Gestión</a>
                                    <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Plan de Gobierno</a></li>
                                    <li><a class="dropdown-item" href="#">Proyectos</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Consultas</a>
                                    <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('Constancias') }}">Constancia de trabajo</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Administración</a>
                                    <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('admin.dataempleados') }}">Importar y Exportar data de empleados</a></li>
                                    <li><a class="dropdown-item" href="#">xxx</a></li>
                                    </ul>
                                </li>
                                <!-- Authentication Links -->
                                @guest
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Registrate') }}</a>
                                        </li>
                                    @endif
                                    @if (Route::has('login'))
                                        <li class="nav-item active">
                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                                        </li>
                                    @endif

                                
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        <main class="py-4">
            @yield('content')
        </main>

        <footer>
            <div class="overlay">
                <div class="mg-footer-bottom-area">
                    <div class="container-fluid">
                        <div class="divide-line"></div>
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="site-branding-text">
                                    <h1 class="site-title">
                                    Alcaldía del Estado Sucre
                                    </h1>
                                    <p class="site-description"></p>
                                </div>
                            </div>
                            <div class="col-md-6 text-right text-xs">
                                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 redes-sociales ">
                                <li class="nav-item">
                                    <a class="nav-link " target="_blank" href="https://es-la.facebook.com/AlcaldiaMpioPotencia">
                                        <span class="icon-soci facebook-icon">
                                            <i class="fab fa-facebook"></i>
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" target="_blank" href="https://mobile.twitter.com/alcaldiacna">
                                        <span class="icon-soci twitter-icon">
                                            <i class="fab fa-twitter"></i>
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" target="_blank" href="https://www.instagram.com/alcaldiacna/?hl=es">
                                        <span class="icon-soci instagram-icon">
                                            <i class="fab fa-instagram"></i>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mg-footer-copyright">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 text-xs">
                                <p>
                                    <a href="http://" target="_blank" rel="noopener noreferrer" class="customize-unpreviewable">Alcaldía
                                    <span class="sep"> | </span>
                                    Cumaná</a>
                                </p>  
                            </div>
                            <div class="col-md-6 text-right text-xs">
                                <ul class="navbar-nav info-right">
                                    <li class="nav-item ">
                                        <a class="nav-link" href="#">Bienvenidos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">¿Quiénes Somos?</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Noticias</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Gacetas Oficiales</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Gestión</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Consultas</a>
                                    </li>
                                    <!-- Authentication Links -->
                                    @guest
                                        @if (Route::has('register'))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('register') }}">{{ __('Registrate') }}</a>
                                            </li>
                                        @endif
                                        @if (Route::has('login'))
                                            <li class="nav-item active">
                                                <a class="nav-link" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                                            </li>
                                        @endif

                                    
                                    @else
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{ Auth::user()->name }}
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                    @endguest
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="{{ asset('js/all.min.js') }}">  </script>
    <script>
        function showTime()
        {
            myDate = new Date();
            hours = myDate.getHours();
            minutes = myDate.getMinutes();   
            if (hours < 10) hours = 0 + hours;
            if (minutes < 10) minutes = "0" + minutes;   
            $("#HoraActual").text(hours+ ":" +minutes);
            setTimeout("showTime()", 1000);
        }
    </script>   
</body>
</html>
