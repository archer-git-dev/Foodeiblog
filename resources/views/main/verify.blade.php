@extends('layout.main')

@section('title', 'FoodKing Blog | Восстановление данных')

@section('content')
    <section>
        <div class="container">
            <div style="padding: 50px 0px;">

                <h4>Для завершения регистрации необходимо подтвердить свой Email</h4>

                <p>Мы отправили ссылку на подтверждение на указанный Email.</p>

                <a href="{{ route('signin') }}">Вернуться на страницу авторизации</a>

            </div>
        </div>
    </section>
@endsection
