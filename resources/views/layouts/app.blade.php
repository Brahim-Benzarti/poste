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
    <!-- <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img style="width:60px;" src="{{ asset('Icon.png') }}" alt="{{ config('app.name', 'Laravel') }}">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" >{{ __('Who are we? ') }}</a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">History</a>
                                <a class="dropdown-item" href="#">Our numbers</a>
                                <a class="dropdown-item" href="#">Our commercial network</a>
                                <!-- <a class="dropdown-item" href="#">News</a> -->
                                <a class="dropdown-item" href="#">Downloads</a>
                                <a class="dropdown-item" href="#">Practical information</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">{{ __('News') }}</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" >{{ __('Services ') }}</a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Businesses</a>
                                <a class="dropdown-item" href="#">Individuals</a>
                                <a class="dropdown-item" href="#">Foreigners</a>
                            </div>
                        </li>
                        
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            <!-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif -->
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <footer class="jumbotron text-center">
        <p>© Copyright 2021-{{date("Y")}} Tunisian Poste. <br>Hédi Nouira St - 1030 Tunis, Tunisia. <br>Call center: 1828 || Phone: 71839000</p>
        <div class="row justify-content-center mt-1">
            <div class="col-sm-3">
                <div class="d-flex justify-content-around">
                    <a target="_blank" href="https://www.facebook.com/TunisianPost/"><img style="width:40px" src="images/icons/facebook.png" alt="facebook icon"></a>
                    <a target="_blank" href="https://twitter.com/Poste_Tn"><img style="width:40px" src="images/icons/twitter.png" alt="twitter icon"></a>
                    <a target="_blank" href="https://www.youtube.com/channel/UCgdccp_xpo1937Jp3N8O_fA"><img style="width:40px" src="images/icons/youtube.png" alt="youtube icon"></a>
                    <a target="_blank" href="https://www.linkedin.com/company/postetunisienne/"><img style="width:40px" src="images/icons/linkedin.png" alt="linkedin icon"></a>
                </div>
            </div>
        </div>
        <p class="mt-3">This website is a reconstruction of the official <a target="_blank" href="http://www.poste.tn/index.php">Poste.tn</a><br>Created by <a target="_blank" href="https://www.linkedin.com/in/brahim-benzarti-227069152/">Brahim Benzarti</a> ,an Undergrad at <a target="_blank" href="http://www.tunis-business-school.tn/">TBS,</a> as an Internship project with La Poste Tunisienne.</p>
    </footer>
</body>
</html>
