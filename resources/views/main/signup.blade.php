@extends('layout.main')

@section('title', 'Fodieblog | Регистрация')


@section('content')
    <section>
        <div class="container">
            <div class="signin__form__text">
                @include('main.includes.errors')
                <form action="{{ route('registration') }}" class="auth_form" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input required type="text" name="username" placeholder="Имя пользователя">
                    <input required type="email" name="email" placeholder="Ваш E-mail">
                    <input required type="password" name="password" placeholder="Пароль">
                    <input required type="password" name="re_password" placeholder="Повторите пароль">
                    <div style="width: 100%;">
                        <label style="margin-left: 0px;">Загрузите свой аватар (необязательно)</label>
                        <input name="avatar" style="border: none;" type="file" accept="image/*">
                    </div>
                    <input type="hidden" name="slug">
                    <button type="submit" class="site-btn">Зарегистрироваться</button>
                    <a href="{{ route('signin') }}">Уже есть аккаунт?</a>
                </form>
            </div>
        </div>
    </section>
@endsection
