@extends('layout.main')

@section('title', 'FoodKing Blog | Редактирование рецепта')


@section('content')
    <!-- Categories Section Begin -->
    <section class="categories categories-grid spad">
        <div class="categories__post">
            <div class="container">
                <div class="categories__grid__post">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="content-area">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="breadcrumb__text">
                                            <h2>Редактирование рецепта - {{$recipe->title}}</h2>
                                        </div>
                                    </div>
                                </div>

                                <!-- Main content -->
                                <section class="content">
                                    <div class="container-fluid">
                                        <!-- Small boxes (Stat box) -->
                                        <div class="row">
                                            <div class="col-6">
                                                @include('admin.includes.errors')
                                            </div>
                                            <div class="col-12">
                                                <form action="{{ route('user.recipes.update', [auth()->user()->slug, $recipe->slug]) }}" method="POST"
                                                      enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="form-group w-75">
                                                        <input type="text" value="{{$recipe->title}}" name="title" class="form-control"
                                                               id="title" placeholder="Название рецепта">
                                                    </div>
                                                    <div class="form-group w-75">
                                                        <label>Краткое описание</label>
                                                        <textarea name="subtitle" class="form-control"
                                                                  placeholder="Описание...">{{ $recipe->subtitle }}</textarea>
                                                    </div>
                                                    <div class="form-group w-75">
                                                        <label>Ингредиенты:</label>

                                                        <input type="text" id="ingredients_inp" name="ingredientsContent"
                                                               class="form-control" placeholder="2 ст. ложки соли">

                                                        <div id="ingredients_btn" class="btn btn-success mt-2">Добавить</div>


                                                        @php
                                                            $ingredients = preg_replace('/(&(?!.*&))/', '', $recipe->ingredients);;
                                                            $ingredients = explode('&,', $ingredients);
                                                            $dataIndex = 0;
                                                        @endphp

                                                        <ul id="ingredients_list" style="list-style: none;">
                                                            @foreach($ingredients as $ingredient)
                                                                <li class="mt-3">
                                                                    <div id="ingredients_actions" class="ingredients" data-index="{{ $dataIndex }}">
                                                                        <span>{{ $ingredient }}</span>
                                                                        <div class="btn btn-warning ml-2 edit_btn"
                                                                             onclick="deleteFromList(this, 'edit')" id="edit_btn">Редактировать
                                                                        </div>
                                                                        <div class="btn btn-danger ml-2 delete_btn"
                                                                             onclick="deleteFromList(this)" id="delete_btn">Удалить
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                @php
                                                                    $dataIndex++;
                                                                @endphp
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    <div class="form-group w-75">
                                                        <label>Шаги приготовления:</label>

                                                        <input type="text" id="process_inp"
                                                               class="form-control" placeholder="Подготовьте необходимые ингредиенты">


                                                        <div id="process_btn" class="btn btn-success mt-2">Добавить</div>

                                                        @php
                                                            $processList = preg_replace('/(&(?!.*&))/', '', $recipe->process);
                                                            $processList = explode('&,', $processList);
                                                            $dataIndex = 0;
                                                        @endphp

                                                        <ul id="process_list" style="list-style: none;">
                                                            @foreach($processList as $processItem)
                                                                <li class="mt-3">
                                                                    <div id="process_actions" class="process" data-index="{{ $dataIndex }}">
                                                                        <span>{{ $processItem }}</span>
                                                                        <div class="btn btn-warning ml-2 edit_btn"
                                                                             onclick="deleteFromList(this, 'edit')" id="edit_btn">Редактировать
                                                                        </div>
                                                                        <div class="btn btn-danger ml-2 delete_btn"
                                                                             onclick="deleteFromList(this)" id="delete_btn">Удалить
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                @php
                                                                    $dataIndex++;
                                                                @endphp
                                                            @endforeach
                                                        </ul>


                                                    </div>
                                                    <div class="form-group w-75">
                                                        <label>Добавить изображение (необязательно)</label>
                                                        <div class="mb-2">
                                                            <img src="{{ url('storage/' . $recipe->image) }}" alt="recipe_image" class="w-50">
                                                        </div>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" name="image">
                                                                <label class="custom-file-label">Выберите изображение</label>
                                                            </div>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">Загрузка</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group w-75">
                                                        <label>Выберите категорию рецепта</label>
                                                        <select name="category_id" class="form-control">
                                                            @foreach($categories as $category)
                                                                <option value="{{ $category->id }}"
                                                                    {{ $category->id == $recipe->category_id ? 'selected' : '' }}
                                                                >{{ $category->title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group w-75">
                                                        <label>Теги</label>
                                                        <select name="tag_ids[]" class="select2" multiple="multiple"
                                                                data-placeholder="Выберите теги" style="width: 100%;">
                                                            @foreach($tags as $tag)
                                                                <option value="{{ $tag->id }}"
                                                                    {{ is_array($recipe->tags->pluck('id')->toArray()) && in_array($tag->id, $recipe->tags->pluck('id')->toArray()) ? 'selected' : '' }}
                                                                >{{ $tag->title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="hidden" name="slug" value="{{ $recipe->slug }}">
                                                        <input type="hidden" value="{{ preg_replace('/(&(?!.*&))/', '', $recipe->ingredients) }}" name="ingredients" id="ingredients_collection">
                                                        <input type="hidden" value="{{ preg_replace('/(&(?!.*&))/', '', $recipe->process) }}" name="process" id="process_collection">
                                                        <input type="submit" class="btn btn-primary" value="Добавить">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /.row -->

                                    </div><!-- /.container-fluid -->
                                </section>
                                <!-- /.content -->

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->


    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/admin.js') }}"></script>
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(function () {
            bsCustomFileInput.init();
        });
        $('.select2').select2();
    </script>
@endsection
