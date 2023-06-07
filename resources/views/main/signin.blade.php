@extends('layout.main')

@section('title', 'Fodieblog :: Авторизация')


@section('content')
    <section>
        <div class="container">
            <div class="signin__form__text">
                @include('main.includes.errors')
                <form action="{{ route('login') }}" class="auth_form" method="POST">
                    @csrf
                    <input required name="username" type="text" placeholder="Имя пользователя">
                    <input required name="password" type="password" placeholder="Пароль">
                    <button type="submit" class="site-btn">Войти</button>
                    <a href="{{ route('signup') }}">Вы еще не зарегистрированы?</a>
                </form>
            </div>
        </div>
    </section>
@endsection
