<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="FoodKing Blog Template">
    <meta name="keywords" content="FoodKing Blog, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800,900&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Unna:400,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
</head>

<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Humberger Begin -->
<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="{{ route('home') }}"><img src="{{ asset('assets/img/humberger/humberger-logo.png') }}" alt=""></a>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li><a href="{{ route('home') }}">Главная</a></li>
            <li class="dropdown"><a href="{{ route('recipes') }}">Рецепты</a>
                <ul class="dropdown__menu">
                    @foreach($categories as $category)
                        <li><a href="{{ route('recipes.category', $category->slug) }}">{{ $category->title }}</a></li>
                    @endforeach
                </ul>
            </li>
            <li><a href="{{ route('about') }}">О нас</a></li>
            <li><a href="{{ route('contact') }}">Контакты</a></li>
            @guest
                <li><a href="{{ route('signin') }}">Войти</a></li>
            @endguest

            @auth
                <li><a href="@if (auth()->user()->role == 'admin') {{ route('admin.home') }} @else {{ route('user.profile', [auth()->user()->slug]) }} @endif">Профиль</a></li>
            @endauth
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="humberger__menu__subscribe">
        <div class="humberger__menu__title sidebar__item__title">
            <h6>Подписаться</h6>
        </div>
        <p>Подпишитесь на нашу рассылку и получайте наши самые свежие новости прямо на свой почтовый ящик.</p>

        @include('main.includes.errors')

        <form action="{{ route('newsletter') }}" method="POST">
            @csrf
            <input required name="email" type="email" class="email-input" placeholder="Ваш E-mail">
            <button type="submit" class="site-btn">Подписаться</button>
        </form>


    </div>
</div>
<!-- Humberger End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-1 col-6 order-md-1 order-1">
                    <div class="header__humberger">
                        <i class="fa fa-bars humberger__open"></i>
                    </div>
                </div>
                <div class="col-lg-8 col-md-10 order-md-2 order-3" style="padding-top: 10px;">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="{{ route('home') }}">Главная</a></li>
                            <li>
                                <a href="{{ route('recipes') }}">Рецепты</a>
                                <div class="header__megamenu__wrapper">
                                    <div class="header__megamenu">
                                        @foreach($categories as $category)
                                            <div class="header__megamenu__item">
                                                <div class="header__megamenu__item--pic set-bg"
                                                     data-setbg="{{ asset('assets/img/megamenu/'.$category->slug.'.jpg') }}">
                                                </div>
                                                <div class="header__megamenu__item--text">
                                                    <h5><a href="{{ route('recipes.category', $category->slug) }}">{{ $category->title }}</a>
                                                    </h5>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </li>
                            <li><a href="{{ route('about') }}">О нас</a></li>
                            <li><a href="{{ route('contact') }}">Контакты</a></li>

                            @guest
                                <li><a href="{{ route('signin') }}">Войти</a></li>
                            @endguest

                            @auth
                                <li><a href="@if (auth()->user()->role == 'admin') {{ route('admin.home') }} @else {{ route('user.profile', [auth()->user()->slug]) }} @endif">Профиль</a></li>
                            @endauth
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-2 col-md-1 col-6 order-md-3 order-2">
                    <div class="header__search">
                        <i class="fa fa-search search-switch"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="header__btn">
                    <a href="#newsletter" class="primary-btn">Подписаться</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="header__logo">
                    <a href="{{ route('home') }}"><img src="{{ asset('assets/img/logo.png') }}" alt="logo"></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="header__social">
                    <a href="https://www.youtube.com/"><i class="fa fa-youtube-play"></i></a>
                    <a href="https://vk.com/"><i class="fa fa-vk"></i></a>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header Section End -->


@yield('content')

<!-- Footer Section Begin -->
<footer class="footer">
    <div class="container-fluid">
        <div class="footer__instagram">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-4 col-6">
                    <div class="footer__instagram__item set-bg"
                         data-setbg="{{ asset('assets/img/footer/ip-1.jpg') }}"></div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-4 col-6">
                    <div class="footer__instagram__item set-bg"
                         data-setbg="{{ asset('assets/img/footer/ip-2.jpg') }}"></div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-4 col-6">
                    <div class="footer__instagram__item set-bg"
                         data-setbg="{{ asset('assets/img/footer/ip-3.jpg') }}"></div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-4 col-6">
                    <div class="footer__instagram__item set-bg"
                         data-setbg="{{ asset('assets/img/footer/ip-4.jpg') }}"></div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-4 col-6">
                    <div class="footer__instagram__item set-bg"
                         data-setbg="{{ asset('assets/img/footer/ip-5.jpg') }}"></div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-4 col-6">
                    <div class="footer__instagram__item set-bg"
                         data-setbg="{{ asset('assets/img/footer/ip-6.jpg') }}"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="footer__text">
                    <div class="footer__logo">
                        <a href="#"><img src="{{ asset('assets/img/logo.png') }}" alt=""></a>
                    </div>
                    <p>
                        Добро пожаловать на наш FoodKing Blog, место, где можно найти вдохновение и вкусные рецепты блюд и
                        напитков! Наша команда страстных кулинаров и любителей еды собрала для вас самые интересные и
                        разнообразные рецепты, чтобы помочь вам создавать восхитительные блюда и напитки прямо у себя
                        дома.
                    </p>
                    <div class="footer__social">
                        <a href="https://www.youtube.com/"><i class="fa fa-youtube-play"></i></a>
                        <a href="https://vk.com/"><i class="fa fa-vk"></i></a>
                    </div>
                </div>
                <div class="footer__copyright">
                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Авторское право &copy;<script>document.write(new Date().getFullYear());</script> | Все права защищены
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Search Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch">+</div>
        <form method="get" class="search-model-form" action="{{ route('recipes') }}">
            <input type="text" name="q" id="search-input" placeholder="Поиск рецептов...">
        </form>
    </div>
</div>
<!-- Search End -->

<!-- Js Plugins -->
<script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/js/slug.js') }}"></script>

</body>

</html>
