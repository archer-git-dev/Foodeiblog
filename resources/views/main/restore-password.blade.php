@extends('layout.main')

@section('title', 'Fodieblog | Восстановление данных')

@section('content')
    <section>
        <div class="container">


            <div class="signin__form__text">
                @include('main.includes.errors')
                <form action="{{ route('restore-password', $user->remember_token) }}" class="auth_form" method="POST">
                    @csrf
                    <input required type="password" name="password" placeholder="Пароль">
                    <input required type="password" name="re_password" placeholder="Повторите пароль">
                    <button type="submit" class="site-btn">Отправить</button>
                </form>
            </div>


        </div>
    </section>
@endsection
