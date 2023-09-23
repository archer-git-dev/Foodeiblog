@extends('layout.main')

@section('title', 'FoodKing Blog | Профиль')


@section('content')
    <!-- About Section Begin -->
    <section class="about spad">
        <div class="container">
            <div class="about__text">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb__text">
                            <h2>Добро пожаловать, {{ $user->username }}!</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-10 order-md-2 order-3" style="padding-top: 10px;">
                        <ul class="profile_list">
                            <li>
                                <a href="{{ route('user.recipes.publication', [auth()->user()->slug]) }}">Опубликованные рецепты</a>
                            </li>
                            <li>
                                <a href="{{ route('user.recipes.not-publication', [auth()->user()->slug]) }}">Неопубликованные рецепты</a>
                            </li>
                            <li>
                                <a href="{{ route('user.recipes.create', [auth()->user()->slug]) }}">Добавить рецепт</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}">Выйти из системы</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->

@endsection
