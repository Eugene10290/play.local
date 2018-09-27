<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>




<!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/home-page/style.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('public/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" >
    <link href="{{ asset('public/css/head/style.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('public/css/main-blog-page/style.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('public/css/blog-page/style.css') }}" rel="stylesheet" type="text/css" >
    @yield('header')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <div class="row" style="width: 100%;">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="height: 100%">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                    </div>

                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-8" style="height: 100%">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav mr-auto">

                            </ul>

                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ml-auto">
                                <!-- Authentication Links -->
                                @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                                @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="mnu">
                                        <li><a href="#">Играй с душой</a>
                                            <ul>
                                                <li><a href="#">Аудио</a></li>
                                                <li><a href="#">Видео</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="{{ url('/blog') }}">Блог</a></li>
                                        <li><a href="#">Ноты</a>
                                            <ul>
                                                <li><a href="#">Бесплатные</a></li>
                                                <li><a href="#">Заказать</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Поддержка проекта</a></li>
                                    </ul>
                                    <div class="section">
                                        <a href="#" class="menu-btn">
                                            <span class="span"></span>
                                        </a>
                                    </div>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        <footer>
            <div class="container">
                <div class="row">
                    <a href="#"><img src="{{ asset('public/img/facebook.png') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('public/img/youtube.png') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('public/img/Instagram.png') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('public/img/telegram.png') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('public/img/whatsapp.png') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('public/img/g+.png') }}" alt=""></a>
                    <p>&#169; 2018 Stulnev Vitaliy. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>

    <script src="{{ asset('public/js/header/script.js') }}"></script>

    @yield('footer')
</body>
</html>
