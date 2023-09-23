@extends('admin.layout.main')

@section('title', 'Admin | UserRecipe - single')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <section class="content">
            <div class="container-fluid" style="padding: 20px 0;">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="single-post__desc">
                            <h4 style="margin-left: 15px;">{{ $recipe->title }}</h4>
                        </div>
                        <div class="single-post__more__details">

                            <div class="col-lg-12 mb-3">
                                <img class="w-50" src="{{ url('storage/' . $recipe->image) }}"
                                     alt="">
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
                            Теги:
                            @foreach($recipe->tags as $tag)
                                <a href="#">{{ $tag->title }}</a>
                            @endforeach
                        </div>

                    </div>
                </div>
                <div class="col-lg-6 mt-3 mb-3">
                    <form action="{{ route('admin.user-recipe.published', [$recipe->slug]) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-block btn-success">Опубликовать</button>
                    </form>
                </div>
                <div class="col-lg-6">

                        @include('admin.includes.errors')

                    <form action="{{ route('admin.user-recipe.feedback', $recipe->slug) }}" method="POST">
                        @csrf
                        <label>Замечание к рецепту</label>
                        <textarea name="feedback" class="form-control"
                                  placeholder="Замечания к рецепту...">{{ old('feedback') }}</textarea>
                        <button type="submit" class="btn btn-block btn-danger mt-3">Отклонить</button>
                    </form>
                </div>
            </div>
        </section>

    </div>
    <!-- /.content-wrapper -->
@endsection
