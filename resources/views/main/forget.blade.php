@extends('layout.main')

@section('title', 'Fodieblog | Восстановление данных')

@section('content')
    <section>
        <div class="container">

            @if (isset($hasUser))

                <div style="padding: 50px 0px;">

                    @if($hasUser)
                        <h4>Ссылка на страницу сброса пароля отправлена на E-mail: {{ $email }}</h4>
                    @else
                        <h4>{{ $email }} отсутсвует в нашей системе. Возможно при регистрации был указан другой E-mail.</h4>
                    @endif

                    <a href="{{ route('signin') }}">Вернуться на страницу авторизации</a>

                </div>


            @else
                <div class="signin__form__text">
                    @include('main.includes.errors')
                    <form action="{{ route('restore') }}" class="auth_form" method="POST">
                        @csrf
                        <label for="">Введите e-mail, который был указан при регистрации</label>
                        <input required name="email" type="email" placeholder="E-mail">
                        <button type="submit" class="site-btn">Отправить</button>
                    </form>
                </div>
            @endif

        </div>
    </section>
@endsection
