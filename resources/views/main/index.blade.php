@extends('layout.main')

@section('title', 'FoodKing Blog | Главная')


@section('content')
<!-- Hero Section Begin -->
<section class="hero">
    <div class="hero__slider owl-carousel">
        @include('main.includes.slide', ['index' => 0])
        @include('main.includes.slide', ['index' => 4])
    </div>
</section>
<!-- Hero Section End -->

<!-- Categories Section Begin -->
<section class="categories spad">
    <div class="categories__post">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="content-area">
                        <div class="categories__post__item categories__post__item--large">
                            <div class="categories__post__item__pic set-bg"
                                 data-setbg="{{ url('storage/' . $recipes[0]->image) }}">
                                <div class="post__meta">
                                    <h4>{{ date('d', strtotime($recipes[0]->created_at)) }}</h4>
                                    <span>{{ date('m', strtotime($recipes[0]->created_at)) }}</span>
                                </div>
                            </div>
                            <div class="categories__post__item__text">
                                <ul class="post__label--large">
                                    <li>{{ $recipes[0]->category->title }}</li>
                                </ul>
                                <h3><a href="{{ route('recipe', $recipes[0]->slug) }}">{{ $recipes[0]->title }}</a></h3>
                                <p>{{ $recipes[0]->subtitle }}</p>
                                <ul class="post__widget">
                                    <li><span class="comment_num">{{ count($recipes[0]->comments) }}</span> комментариев</li>
                                </ul>
                                <a href="{{ route('recipe',$recipes[0]->slug) }}" class="primary-btn">Подробнее</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                @for($i = 1; $i < 5; $i++)
                                    @include('main.includes.recipe_item')
                                @endfor
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                @for($i = 5; $i < 9; $i++)
                                    @include('main.includes.recipe_item')
                                @endfor
                            </div>
                            <div class="col-lg-12 text-center">
                                <div class="load__more__btn">
                                    <a href="{{ route('recipes') }}">Больше рецептов</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('main.includes.sidebar')
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

@endsection
