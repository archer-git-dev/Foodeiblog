@extends('layout.main')

@section('title', 'FoodKing Blog | Контакты')


@section('content')
    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="contact__text">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb__text">
                            <h2>Контакты</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="contact__map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2243.6056729655625!2d49.12597957180043!3d55.78272017897442!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x415ead0f5ef090b5%3A0x51cd1303eddbe0c6!2z0KHQutGA0YPQtNC2!5e0!3m2!1sru!2sru!4v1686464592935!5m2!1sru!2sru"
                                width="500" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <div class="contact__widget" style="margin-top: 30px;">
                            <ul>
                                <li>
                                    <i class="fa fa-map-marker"></i>
                                    <span>ул. Островского, 79, Казань, Респ. Татарстан, 420107</span>
                                </li>
                                <li>
                                    <i class="fa fa-mobile"></i>
                                    <span>Телефон: 258-556-189</span>
                                </li>
                                <li>
                                    <i class="fa fa-envelope-o"></i>
                                    <span>Email: FoodKing Blog@gmail.com</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="contact__form">
                            <div class="contact__form__title">
                                <h2>СВЯЖИТЕСЬ С НАМИ</h2>
                                <p>Вы можете оставить любой интересующий вас вопрос о нашем блоге. Ответ придет на ваш указанный почтовый ящик.</p>
                                <p>Мы фильтруем сообщения. Вопрос должен быть корректным и по теме нашего блога. Иначе ответ не придет.</p>
                            </div>

                            @include('main.includes.errors')

                            <form action="{{ route('contact.message') }}" method="POST">
                                @csrf
                                <input required type="text" name="username" placeholder="Имя пользователя">
                                <input required type="email" name="email" placeholder="Email">
                                <textarea required name="text" placeholder="Ваш вопрос"></textarea>
                                <button type="submit" class="site-btn">Отправить</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
@endsection
