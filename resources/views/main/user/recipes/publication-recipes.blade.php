@extends('layout.main')

@section('title', 'FoodKing Blog | Опубликованные рецепты')


@section('content')
    <!-- Categories Section Begin -->
    <section class="categories categories-grid spad">
        <div class="categories__post">
            <div class="container">
                <div class="categories__grid__post">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="content-area">

                                @if (count($publicationRecipes) == 0)
                                    <h2>Рецепты не найдены...</h2>
                                @else
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="breadcrumb__text">
                                                <h2>Опубликованные рецепты</h2>
                                            </div>
                                        </div>
                                    </div>
                                    @foreach($publicationRecipes as $recipe)
                                        <div class="categories__list__post__item">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="categories__post__item__pic set-bg"
                                                         data-setbg="{{ url('storage/' . $recipe->image) }}">
                                                        <div class="post__meta">
                                                            <h4>{{ date('d', strtotime($recipe->created_at)) }}</h4>
                                                            <span>{{ date('m', strtotime($recipe->created_at)) }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="categories__post__item__text">
                                                        <span class="post__label">{{ $recipe->category_title }}</span>
                                                        <h3><a href="{{ route('recipe', $recipe->slug) }}">{{ $recipe->title }}</a></h3>
                                                        <p>{{ explode('.', $recipe->subtitle)[0] }}...</p>
                                                        <ul class="post__widget">
                                                            <li><span class="comment_num">{{ $recipe->comment_count }}</span>
                                                                комментариев
                                                            </li>
                                                        </ul>
                                                        <p>Автор: {{ $user->role == 'admin' ? 'FoodKing Blog' : $user->username }}</p>
                                                        <div style="display: flex;">
                                                            <a class="site-btn link" href="{{ route('user.recipes.edit', [$user->slug, $recipe->slug]) }}">Редактировать</a>
                                                            <form style="margin-left: 10px;"  action="{{ route('user.recipes.delete', [$user->slug, $recipe->slug]) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="site-btn">
                                                                    Удалить
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                @endif


                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->
@endsection
