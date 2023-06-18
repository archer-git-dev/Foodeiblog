@extends('layout.main')

@section('title', 'Fodieblog | О нас')


@section('content')
    <!-- About Section Begin -->
    <section class="about spad">
        <div class="container">
            <div class="about__text">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb__text">
                            <h2>О нас</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="about__pic__item__large">
                            <img src="{{ asset('assets/img/about/about-1.jpg') }}" alt="">
                        </div>
                        <div class="about__pic">
                            <div class="about__pic__item">
                                <img src="{{ asset('assets/img/about/about-2.jpg') }}" alt="">
                            </div>
                            <div class="about__pic__item">
                                <img src="{{ asset('assets/img/about/about-3.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about__right__text">
                            <h2>Добро пожаловать на Foodeiblog!</h2>
                            <p>Наша команда страстных кулинаров и любителей еды собрала для вас самые интересные и
                                разнообразные рецепты, чтобы помочь вам создавать восхитительные блюда и напитки прямо у
                                себя дома.</p>
                            <p>
                                В нашем блоге вы найдете множество рецептов на любой вкус и на любой случай: от быстрых
                                и простых рецептов для повседневного обеда или ужина до изысканных блюд, подходящих для
                                особых событий и встреч с друзьями. Мы также не забываем о десертах и выпечке, предлагая
                                сладкие угощения и восхитительные торты.
                            </p>
                            <p>Наши рецепты не только вкусные, но и доступны. Мы стремимся использовать легко доступные
                                ингредиенты, чтобы вы могли готовить в любое время и без лишних затрат. Кроме того, мы
                                предлагаем разнообразные варианты для различных диетических предпочтений, включая
                                вегетарианскую, веганскую, безглютеновую и другие.</p>
                            <div class="about__right__text__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->

@endsection
