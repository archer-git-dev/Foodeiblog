@extends('layout.main')

@section('title', 'FoodKing Blog | ' . $recipe->title)


@section('content')
    <!-- Single Post Section Begin -->
    <section class="single-post spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="single-post__desc">
                        <h4 style="margin-left: 15px;">{{ $recipe->title }}</h4>
                    </div>
                    <div class="single-post__more__details">

                            <div class="col-lg-12 mb-3">
                                <img src="{{ url('storage/' . $recipe->image) }}" alt="">
                            </div>
                            <div class="col-lg-12">
                                <p>
                                    {{ $recipe->subtitle }}
                                </p>
                                <div class="single-post__desc">
                                    <h4>Ингредиенты: </h4>
                                </div>

                                @php
                                    $ingredients = preg_replace('/(&(?!.*&))/', '', $recipe->ingredients);
                                    $ingredients = explode('&,', $ingredients);

                                    $processList = preg_replace('/(&(?!.*&))/', '', $recipe->process);
                                    $processList = explode('&,', $processList);
                                @endphp

                                <ul class="single-post__list">
                                    @foreach($ingredients as $ingredient)
                                    <li>
                                        {{ $ingredient }}
                                    </li>
                                    @endforeach
                                </ul>

                                <div class="single-post__desc">
                                    <h4>Процесс приготовления: </h4>
                                </div>

                                <ul class="single-post__list">
                                    @foreach($processList as $process)
                                        <li>
                                            {{ $process }}
                                        </li>
                                    @endforeach
                                </ul>


                            </div>

                    </div>
                    {{--<div class="single-post__last__text"></div>--}}
                    <div class="single-post__tags">
                        @foreach($recipe->tags as $tag)
                            <a href="#">{{ $tag->title }}</a>
                        @endforeach
                    </div>
                    <div class="single-post__comment">
                        <div class="widget__title">
                            <h4>Комментарии</h4>
                        </div>

                        @if (count($comments) != 0)
                            @foreach($comments as $comment)
                                <div class="single-post__comment__item">
                                    <div>
                                        <div class="single-post__comment__item__pic">
                                            <img src="{{ url('storage/' . $comment->user->avatar) }}" alt="avatar">
                                        </div>
                                        <div class="single-post__comment__item__text">
                                            <h5>{{ $comment->user->username }}</h5>
                                            <span>{{ date('d.m.Y', strtotime($comment->created_at)) }}</span>
                                            <p>{{ $comment->text }}</p>
                                        </div>
                                    </div>
                                    @if (auth()->user())
                                        @if (auth()->user()->role == 'admin' || auth()->user()->id == $comment->user->id)
                                            <div>
                                                <form action="{{ route('recipe.comment.delete', $comment->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Удалить</button>
                                                </form>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            @endforeach
                        @else
                            <h4>Комментарии к этому рецепту пока отсутствуют</h4>
                        @endif


                    </div>
                    <div class="single-post__leave__comment">
                        <div class="widget__title">
                            <h4>Оставить комментарий</h4>
                        </div>
                        @auth

                            @include('main.includes.errors')

                            <form action="{{ route('recipe.comment.create', $recipe->slug) }}" method="POST">
                                @csrf
                                <textarea name="text" placeholder="Комментарий"></textarea>
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
                                <label>Ваш комментарий будет опубликован после проверки модератора!</label>
                                <button type="submit" class="site-btn">Отправить</button>
                            </form>

                        @endauth
                        @guest
                            <form action="#" method="POST">
                                <textarea name="text" placeholder="Комментарий"></textarea>
                                <label>Для отправки комментария необходимо <a href="{{ route('signin') }}">авторизоваться</a></label>
                                <button style="opacity: 0.5" type="submit" disabled class="site-btn">Отправить</button>
                            </form>
                        @endguest

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Single Post Section End -->
@endsection
