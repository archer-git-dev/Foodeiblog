@extends('layout.main')

@section('title', 'FoodKing Blog | Главная')


@section('content')
<!-- Hero Section Begin -->
<section class="hero">
    <div class="hero__slider owl-carousel">
        <div class="hero__item">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 p-0">
                        <a href="{{ route('recipe', $popular_recipes[0]->slug) }}">
                            <div class="hero__inside__item hero__inside__item--wide set-bg"
                                 data-setbg="{{ url('storage/' . $popular_recipes[0]->image) }}">
                                <div class="hero__inside__item__text">
                                    <div class="hero__inside__item--meta post__meta">
                                        <span>{{ date('d', strtotime($popular_recipes[0]->updated_at)) }}</span>
                                        <p>{{ date('m', strtotime($popular_recipes[0]->updated_at)) }}</p>
                                    </div>
                                    <div class="hero__inside__item--text">
                                        <ul class="label">
                                            <li>{{ $popular_recipes[0]->category->title }}</li>
                                        </ul>
                                        <h4>{{ $popular_recipes[0]->title }}</h4>
                                        <ul class="widget">
                                            <li><span class="comment_num">{{ count($popular_recipes[0]->comments) }}</span> комментариев</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6  p-0">
                        <a href="{{ route('recipe', $popular_recipes[1]->slug) }}">
                            <div class="hero__inside__item hero__inside__item--small set-bg"
                                 data-setbg="{{ url('storage/' . $popular_recipes[1]->image) }}">
                                <div class="hero__inside__item__text">
                                    <div class="hero__inside__item--meta post__meta">
                                        <span>{{ date('d', strtotime($popular_recipes[1]->updated_at)) }}</span>
                                        <p>{{ date('m', strtotime($popular_recipes[1]->updated_at)) }}</p>
                                    </div>
                                    <div class="hero__inside__item--text">
                                        <ul class="label">
                                            <li>{{ $popular_recipes[1]->category->title }}</li>
                                        </ul>
                                        <h4>{{ $popular_recipes[1]->title }}</h4>
                                        <ul class="widget">
                                            <li><span class="comment_num">{{ count($popular_recipes[1]->comments) }}</span> комментариев</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="{{ route('recipe', $popular_recipes[2]->slug) }}">
                            <div class="hero__inside__item hero__inside__item--small set-bg"
                                 data-setbg="{{ url('storage/' . $popular_recipes[2]->image) }}">
                                <div class="hero__inside__item__text">
                                    <div class="hero__inside__item--meta post__meta">
                                        <span>{{ date('d', strtotime($popular_recipes[2]->updated_at)) }}</span>
                                        <p>{{ date('m', strtotime($popular_recipes[2]->updated_at)) }}</p>
                                    </div>
                                    <div class="hero__inside__item--text">
                                        <ul class="label">
                                            <li>{{ $popular_recipes[2]->category->title }}</li>
                                        </ul>
                                        <h4>{{ $popular_recipes[2]->title }}</h4>
                                        <ul class="widget">
                                            <li><span class="comment_num">{{ count($popular_recipes[2]->comments) }}</span> комментариев</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6  p-0">
                        <a href="{{ route('recipe', $popular_recipes[3]->slug) }}">
                            <div class="hero__inside__item set-bg" data-setbg="{{ url('storage/' . $popular_recipes[3]->image) }}">
                                <div class="hero__inside__item__text">
                                    <div class="hero__inside__item--meta post__meta">
                                        <span>{{ date('d', strtotime($popular_recipes[3]->updated_at)) }}</span>
                                        <p>{{ date('m', strtotime($popular_recipes[3]->updated_at)) }}</p>
                                    </div>
                                    <div class="hero__inside__item--text">
                                        <ul class="label">
                                            <li>{{ $popular_recipes[3]->category->title }}</li>
                                        </ul>
                                        <h4>{{ $popular_recipes[3]->title }}</h4>
                                        <ul class="widget">
                                            <li><span class="comment_num">{{ count($popular_recipes[3]->comments) }}</span> комментариев</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero__item">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 p-0">
                        <a href="{{ route('recipe', $popular_recipes[4]->slug) }}">
                            <div class="hero__inside__item hero__inside__item--wide set-bg"
                                 data-setbg="{{ url('storage/' . $popular_recipes[4]->image) }}">
                                <div class="hero__inside__item__text">
                                    <div class="hero__inside__item--meta post__meta">
                                        <span>{{ date('d', strtotime($popular_recipes[4]->updated_at)) }}</span>
                                        <p>{{ date('m', strtotime($popular_recipes[4]->updated_at)) }}</p>
                                    </div>
                                    <div class="hero__inside__item--text">
                                        <ul class="label">
                                            <li>{{ $popular_recipes[4]->category->title }}</li>
                                        </ul>
                                        <h4>{{ $popular_recipes[4]->title }}</h4>
                                        <ul class="widget">
                                            <li><span class="comment_num">{{ count($popular_recipes[4]->comments) }}</span> комментариев</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 p-0">
                        <a href="{{ route('recipe', $popular_recipes[5]->slug) }}">
                            <div class="hero__inside__item hero__inside__item--small set-bg"
                                 data-setbg="{{ url('storage/' . $popular_recipes[5]->image) }}">
                                <div class="hero__inside__item__text">
                                    <div class="hero__inside__item--meta post__meta">
                                        <span>{{ date('d', strtotime($popular_recipes[5]->updated_at)) }}</span>
                                        <p>{{ date('m', strtotime($popular_recipes[5]->updated_at)) }}</p>
                                    </div>
                                    <div class="hero__inside__item--text">
                                        <ul class="label">
                                            <li>{{ $popular_recipes[5]->category->title }}</li>
                                        </ul>
                                        <h4>{{ $popular_recipes[5]->title }}</h4>
                                        <ul class="widget">
                                            <li><span class="comment_num">{{ count($popular_recipes[5]->comments) }}</span> комментариев</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="{{ route('recipe', $popular_recipes[6]->slug) }}">
                            <div class="hero__inside__item hero__inside__item--small set-bg"
                                 data-setbg="{{ url('storage/' . $popular_recipes[6]->image) }}">
                                <div class="hero__inside__item__text">
                                    <div class="hero__inside__item--meta post__meta">
                                        <span>{{ date('d', strtotime($popular_recipes[6]->updated_at)) }}</span>
                                        <p>{{ date('m', strtotime($popular_recipes[6]->updated_at)) }}</p>
                                    </div>
                                    <div class="hero__inside__item--text">
                                        <ul class="label">
                                            <li>{{ $popular_recipes[6]->category->title }}</li>
                                        </ul>
                                        <h4>{{ $popular_recipes[6]->title }}</h4>
                                        <ul class="widget">
                                            <li><span class="comment_num">{{ count($popular_recipes[6]->comments) }}</span> комментариев</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 p-0">
                        <a href="{{ route('recipe', $popular_recipes[7]->slug) }}">
                            <div class="hero__inside__item set-bg" data-setbg="{{ url('storage/' . $popular_recipes[7]->image) }}">
                                <div class="hero__inside__item__text">
                                    <div class="hero__inside__item--meta post__meta">
                                        <span>{{ date('d', strtotime($popular_recipes[7]->updated_at)) }}</span>
                                        <p>{{ date('m', strtotime($popular_recipes[7]->updated_at)) }}</p>
                                    </div>
                                    <div class="hero__inside__item--text">
                                        <ul class="label">
                                            <li>{{ $popular_recipes[7]->category->title }}</li>
                                        </ul>
                                        <h4>{{ $popular_recipes[7]->title }}</h4>
                                        <ul class="widget">
                                            <li><span class="comment_num">{{ count($popular_recipes[7]->comments) }}</span> комментариев</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
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
                                    <h4>{{ date('d', strtotime($recipes[0]->updated_at)) }}</h4>
                                    <span>{{ date('m', strtotime($recipes[0]->updated_at)) }}</span>
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
                                    <div class="categories__post__item">
                                    <div class="categories__post__item__pic small__item set-bg"
                                         data-setbg="{{ url('storage/' . $recipes[$i]->image) }}">
                                        <div class="post__meta">
                                            <h4>{{ date('d', strtotime($recipes[$i]->updated_at)) }}</h4>
                                            <span>{{ date('m', strtotime($recipes[$i]->updated_at)) }}</span>
                                        </div>
                                    </div>
                                    <div class="categories__post__item__text">
                                        <span class="post__label">{{ $recipes[$i]->category->title }}</span>
                                        <h3><a href="{{ route('recipe', $recipes[$i]->slug) }}">{{ $recipes[$i]->title }}</a></h3>
                                        <p>{{ explode('.', $recipes[$i]->subtitle)[0] }}...</p>
                                        <ul class="post__widget">
                                            <li><span class="comment_num">{{ count($recipes[$i]->comments) }}</span> комментариев</li>
                                        </ul>
                                    </div>
                                </div>
                                @endfor
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                @for($i = 5; $i < 9; $i++)
                                    <div class="categories__post__item">
                                        <div class="categories__post__item__pic small__item set-bg"
                                             data-setbg="{{ url('storage/' . $recipes[$i]->image) }}">
                                            <div class="post__meta">
                                                <h4>{{ date('d', strtotime($recipes[$i]->updated_at)) }}</h4>
                                                <span>{{ date('m', strtotime($recipes[$i]->updated_at)) }}</span>
                                            </div>
                                        </div>
                                        <div class="categories__post__item__text">
                                            <span class="post__label">{{ $recipes[$i]->category->title }}</span>
                                            <h3><a href="{{ route('recipe', $recipes[$i]->slug) }}">{{ $recipes[$i]->title }}</a></h3>
                                            <p>{{ explode('.', $recipes[$i]->subtitle)[0] }}...</p>
                                            <ul class="post__widget">
                                                <li><span class="comment_num">{{ count($recipes[$i]->comments) }}</span> комментариев</li>
                                            </ul>
                                        </div>
                                    </div>
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
