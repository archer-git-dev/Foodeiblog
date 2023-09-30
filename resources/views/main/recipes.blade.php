@extends('layout.main')

@section('title', 'FoodKing Blog | Рецепты')


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
                                    <h2>
                                        @if (request()->q)
                                            Поиск по запросу: <span>{{ request()->q }}</span>
                                        @else
                                            Категория:
                                            <span>
                                            @if ( isset($category) )
                                                    {{ $category->title }}
                                                @else
                                                    Все рецепты
                                                @endif
                                            </span>
                                        @endif

                                    </h2>
                                </div>

                                @if (count($recipes) == 0)
                                    <h2>Рецепты не найдены...</h2>
                                @else
                                    @foreach($recipes as $recipe)
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
                                                            <li><span>Автор: </span>
                                                                {{ $recipe->user->role == 'admin' ? 'FoodKing Blog' : $recipe->user->username }}
                                                            </li>
                                                        </ul>
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
                                @endif


                            </div>
                        </div>

                        @if (count($recipes) >= 5)
                            @include('main.includes.sidebar')
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->
@endsection
