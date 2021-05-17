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

    <!-- Styles -->
    {{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/category.css') }}">
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

    <link rel="stylesheet" href="{{ asset('css/adaptive.css') }}">

    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
</head>
<body>
<div id="app">
<header>
    <div class="center_box">
        <div id="logo">
            <a href="{{ route('home') }}">
                <h1>Soup</h1>
                <h2>culture</h2>
                <h3>Харьков</h3>
            </a>
        </div>
        <div id="dash-nav-wrapper">
            <div id="dashboard-wrapper">
                <a href="#">
                    <img title="Корзина покупок" class="shopingcart" src="{{ asset('images/shopingcart-white.png') }}">
                </a>
                <a href="#">
                    <img title="Выбор языка" class="lang_selector" src="{{ asset('images/ru.png') }}">
                </a>
                <!--                <a href="#">-->
                <!--                    <img title="Выбор языка" class="lang_selector" src="images/ua.png">-->
                <!--                </a>-->
                @auth
                    <a href="#">
                        <img title="Личный кабинет" class="lichniy_cabinet"
                             src="{{ asset('images/lichniy_cabinet.png') }}">
                    </a>
                @endauth
            </div>
            <nav>
                <a href="{{ route('home') }}"
                   @if(Route::currentRouteName() == 'home')
                   class="active_href"
                    @endif
                >
                    ГЛАВНАЯ
                </a>
                <a @if(Route::currentRouteName() == 'menu.index')
                   class="active_href"
                   @endif
                   href="{{ route('menu.index') }}"
                >
                    МЕНЮ
                </a>
                <a
                    @if(Route::currentRouteName() == 'delivery')
                    class="active_href"
                    @endif
                    href="{{ route('delivery') }}"
                >
                    ДОСТАВКА И ОПЛАТА
                </a>
                <a
                    @if(Route::currentRouteName() == 'about')
                    class="active_href"
                    @endif
                    href="{{ route('about') }}"
                >
                    О НАС
                </a>
                @guest
                    <a href="{{ route('login') }}">ВХОД</a>
                    <a href="{{ route('register') }}">РЕГИСТРАЦИЯ</a>
                @else
                    <a
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                    >
                        ВЫХОД
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest
            </nav>
        </div>
        <div class="hamburger-menu">
            <div id="dashboard-wrapper-small">
                <a href="#">
                    <img title="Корзина покупок" class="shopingcart" src="{{ asset('images/shopingcart-white.png') }}">
                </a>
                <a href="#">
                    <img title="Выбор языка" class="lang_selector" src="{{ asset('images/ru.png') }}">
                </a>
                <!--                <a href="#">-->
                <!--                    <img title="Выбор языка" class="lang_selector" src="images/ua.png">-->
                <!--                </a>-->
                <!--                <a href="#">-->
                <!--                    <img title="Личный кабинет" class="lichniy_cabinet" src="images/lichniy_cabinet.png">-->
                <!--                </a>-->
            </div>
            <input id="menu__toggle" type="checkbox"/>
            <label class="menu__btn" for="menu__toggle">
                <span></span>
            </label>
            <ul class="menu__box">
                <li><a class="menu__item" href="{{ route('home') }}">ГЛАВНАЯ</a></li>
                <li><a class="menu__item" href="{{ route('menu.index') }}">МЕНЮ</a></li>
                <li><a class="menu__item" href="{{ route('delivery') }}">ДОСТАВКА И ОПЛАТА</a></li>
                <li><a class="menu__item" href="{{ route('about') }}">О НАС</a></li>
                @guest
                    <li><a class="menu__item" href="{{ route('login') }}">ВХОД</a></li>
                    <li><a class="menu__item" href="{{ route('register') }}">РЕГИСТРАЦИЯ</a></li>
                @else
                    <li>
                        <a
                            class="menu__item"
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                        >
                            ВЫХОД
                        </a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</header>

<main>
@yield('content')
</main>

<footer>
    <div class="center_box">
        <a href="{{ route('home') }}"> Soup Culture 2020 </a>
        <div class="social-bottom">
            <a href="https://www.facebook.com/soupculture.kh" target="_blank">
                <img src="{{ asset('images/fb-footer.png') }}" alt="Facebook">
            </a>
            <a href="https://www.instagram.com/soupculture.kh" target="_blank">
                <img src="{{ asset('images/insta-footer.png') }}" alt="Instagram">
            </a>
        </div>
    </div>
</footer>
</div>
</body>
</html>
