@component('mail::message')

    <h1>Уважаемый, {{ $user['username'] }}</h1>

    <p>Для окончательной регистрации подтвердите свой Email:</p>

    <form action="{{ route('verified') }}" method="POST">
        @csrf
        <input type="hidden" name="data" value="{{ json_encode($user) }}">
        <button class="btn btn-primary">Подтвердить Email</button>
    </form>




