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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('public/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" >
    <link href="{{ asset('public/css/head/style.css') }}" rel="stylesheet" type="text/css" >
    @yield('header')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <div class="row" >
                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12" style="height: 100%">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            {{ config('app.name', 'Виталий Стульнев') }}
                        </a>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-8" style="height: 100%">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav mr-auto">

                            </ul>

                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ml-auto">
                                <!-- Authentication Links -->
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
                                            <li><a href="{{ url('shops') }}">Купить</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{ url('/about') }}">О нас</a></li>
                                </ul>
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link gate-site" href="{{ route('login') }}">{{ __('Вход') }}</a>
                                    </li>
                                @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                            {{ __('Выход') }}
                                        </a>
                                        @if(\Entrust::can('index'))
                                            <a class="dropdown-item" href="{{ url('admin/') }}">{{ __('Админ-панель') }}</a>
                                        @endif
                                        <a class="dropdown-item" href="{{ url('user/orders') }}">Заказы</a>

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
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
            <a href="{{ url('shopping-cart') }}" class="basket">
                <span class="badge" style="background-color: red">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
                <img src="{{ asset('public/img/basket.png') }}" class="img-basket" alt="">
            </a>
            <div class="d-lg-none d-md-none hidden-sm col-xs-8" style="height: 100%">
            <div class="header">
                <div class="hamburger">
                    <button class="button-ham hamburger__button js-menu__toggle">
                        <span class="hamburger__label">Open menu</span>
                    </button>
                </div>
                <nav class="menu">
                    <ul class="list menu__list">
                        <li class="menu__group">
                            <a href="#0" class="link menu__link">Играй с душой</a>
                            <ul>
                                <li><a href="#">Аудио</a></li>
                                <li><a href="#">Видео</a></li>
                            </ul>
                        </li>
                        <li class="menu__group">
                            <a href="{{ url('/blog') }}" class="link menu__link">Блог</a>
                        </li>
                        <li class="menu__group">
                            <a href="#" class="link menu__link">Ноты</a>
                            <ul>
                                <li><a href="{{ url('shops') }}">Купить</a></li>
                            </ul>
                        </li>
                        <li class="menu__group">
                            <a href="{{ url('/about') }}" class="link menu__link">О нас</a>
                        </li>
                        @guest
                            <li class="menu__group nav-item unlogin">
                                <a class="nav-link gate-site1" href="{{ route('login') }}">{{ __('Вход') }}</a>
                            </li>
                        @else
                            <li class="menu__group nav-item dropdown unlogin">
                                <a id="" class="nav-link dropdown-toggle unlogin-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="menu__group" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item1" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                        {{ __('Выход') }}
                                    </a>
                                    @if(\Entrust::can('index'))
                                        <a class="dropdown-item1" href="admin">{{ __('Админ-панель') }}</a>
                                    @endif
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </nav>
            </div>
            </div>
        </main>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="visa">
                        <b>Мы принимаем:</b>
                        <img src="{{ asset('public/img/Visa.png') }}" alt="">
                    </div>
                    <div class="link">
                        <a href="#"><img src="{{ asset('public/img/facebook.png') }}" alt=""></a>
                        <a href="#"><img src="{{ asset('public/img/youtube.png') }}" alt=""></a>
                        <a href="#"><img src="{{ asset('public/img/Instagram.png') }}" alt=""></a>
                        <a href="#"><img src="{{ asset('public/img/telegram.png') }}" alt=""></a>
                        <a href="#"><img src="{{ asset('public/img/whatsapp.png') }}" alt=""></a>
                        <a href="#"><img src="{{ asset('public/img/g+.png') }}" alt=""></a>
                        <p>&#169; 2018 Stulnev Vitaliy. All rights reserved.</p>

                    </div>

                </div>
            </div>
        </footer>
    </div>

    <script src="{{ asset('public/js/header/script.js') }}"></script>
    @yield('footer')
</body>
</html>
