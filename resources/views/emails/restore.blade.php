@component('mail::message')

    <h1>Уважаемый, {{ $user->username }}</h1>

    Ссылка для сброса пароля:

    @component('mail::button', ['url' => url('restore-password/'.$user->remember_token)])
        Сброс пароля
    @endcomponent


@endcomponent
