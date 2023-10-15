@component('mail::message')

    <h1>Уважаемый, {{ $user['username'] }}</h1>

    <p>Для окончательной регистрации подтвердите свой Email:</p>

    @component('mail::button', ['url' => url('verify/'.$user['remember_token'])])
        Подтвердить Email
    @endcomponent




