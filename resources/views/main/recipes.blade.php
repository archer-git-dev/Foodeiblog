@extends('layout.main')

@section('title', 'Fodieblog :: Рецепты')


@section('content')
    <!-- Categories Section Begin -->
    <section class="categories categories-grid spad">
        <div class="categories__post">
            <div class="container">
                <div class="categories__grid__post">
                    <div class="row">
                        <div class="col-lg-8 col-md-8">
                            <div class="content-area">

                                <div class="breadcrumb__text">
                                    <h2>Категория:
                                        <span>
                                            @if ( isset($category) )
                                                {{ $category->title }}
                                            @else
                                                Все рецепты
                                            @endif
                                        </span>
                                    </h2>
                                </div>


                                @foreach($recipes as $recipe)
                                    <div class="categories__list__post__item">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="categories__post__item__pic set-bg"
                                                     data-setbg="{{ url('storage/' . $recipe->image) }}">
                                                    <div class="post__meta">
                                                        <h4>{{ date('d', strtotime($recipe->updated_at)) }}</h4>
                                                        <span>{{ date('m', strtotime($recipe->updated_at)) }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="categories__post__item__text">
                                                    <span class="post__label">{{ $recipe->category->title }}</span>
                                                    <h3><a href="{{ route('recipe', $recipe->slug) }}">{{ $recipe->title }}</a></h3>
                                                    <ul class="post__widget">
                                                        <li><span class="comment_num">{{ count($recipe->comments) }}</span>
                                                            комментариев
                                                        </li>
                                                    </ul>
                                                    <p>{!! $recipe->content !!}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="categories__pagination">
                                            {{ $recipes->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('main.includes.sidebar')
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->
@endsection
