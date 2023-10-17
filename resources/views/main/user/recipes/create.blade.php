@extends('layout.main')

@section('title', 'FoodKing Blog | Добавление рецепта')


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
                                            <h2>Добавление рецепта</h2>
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
                                                <form action="{{ route('user.recipes.store', [auth()->user()->slug]) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group w-75">
                                                        <label>Название рецепта</label>
                                                        <input type="text" value="{{ old('title') }}" name="title" class="form-control"
                                                               id="title" placeholder="Курица по-испански">
                                                    </div>
                                                    <div class="form-group w-75">
                                                        <label>Краткое описание</label>
                                                        <textarea name="subtitle" class="form-control"
                                                                  placeholder="Описание...">{{ old('subtitle') }}</textarea>
                                                    </div>
                                                    <div class="form-group w-75">
                                                        <label>Ингредиенты:</label>

                                                        <input type="text" id="ingredients_inp" name="ingredientsContent"
                                                               class="form-control" placeholder="2 ст. ложки соли">

                                                        <div id="ingredients_btn" class="btn btn-success mt-2">Добавить</div>


                                                        @if (old('ingredients'))
                                                            @php
                                                                $ingredients = preg_replace('/(&(?!.*&))/', '', old('ingredients'));;
                                                                $ingredients = explode('&,', $ingredients);
                                                                $dataIndex = 0;
                                                            @endphp

                                                            <ul id="ingredients_list" style="list-style: none;">
                                                                @foreach($ingredients as $ingredient)
                                                                    <li class="mt-3">
                                                                        <div id="ingredients_actions" class="ingredients" data-index="{{ $dataIndex }}">
                                                                            <span>{{ $ingredient }}</span>
                                                                            <div class="btn btn-warning ml-2 edit_btn" onclick="deleteFromList(this, 'edit')" id="edit_btn">Редактировать</div>
                                                                            <div class="btn btn-danger ml-2 delete_btn" onclick="deleteFromList(this)" id="delete_btn">Удалить</div>
                                                                        </div>
                                                                    </li>
                                                                    @php
                                                                        $dataIndex++;
                                                                    @endphp
                                                                @endforeach
                                                            </ul>

                                                        @else
                                                            <ul id="ingredients_list" style="list-style: none;"></ul>
                                                        @endif

                                                    </div>
                                                    <div class="form-group w-75">
                                                        <label>Шаги приготовления:</label>

                                                        <input type="text" id="process_inp"
                                                               class="form-control" placeholder="Подготовьте необходимые ингредиенты">


                                                        <div id="process_btn" class="btn btn-success mt-2">Добавить</div>

                                                        @if (old('process'))
                                                            @php
                                                                $processList = preg_replace('/(&(?!.*&))/', '', old('process'));
                                                                $processList = explode('&,', $processList);
                                                                $dataIndex = 0;
                                                            @endphp

                                                            <ul id="process_list" style="list-style: none;">
                                                                @foreach($processList as $processItem)
                                                                    <li class="mt-3">
                                                                        <div id="process_actions" class="process">
                                                                            <span>{{ $processItem }}</span>
                                                                            <div class="btn btn-warning ml-2 edit_btn" onclick="deleteFromList(this, 'edit')" id="edit_btn" data-index="{{ $dataIndex }}">Редактировать</div>
                                                                            <div class="btn btn-danger ml-2 delete_btn" onclick="deleteFromList(this)" id="delete_btn">Удалить</div>
                                                                        </div>
                                                                    </li>
                                                                    @php
                                                                        $dataIndex++;
                                                                    @endphp
                                                                @endforeach
                                                            </ul>

                                                        @else
                                                            <ul id="process_list" style="list-style: none;"></ul>
                                                        @endif


                                                    </div>
                                                    <div class="form-group w-75">
                                                        <label>Добавить изображение (необязательно)</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" name="image" required>
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
                                                                    {{ $category->id == old('category_id') ? 'selected' : '' }}
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
                                                                    {{ is_array(old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? 'selected' : '' }}
                                                                >{{ $tag->title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="hidden" name="slug" value="{{ old('slug') }}">
                                                        <input type="hidden" value="{{ preg_replace('/(&(?!.*&))/', '', old('ingredients')) }}" name="ingredients" id="ingredients_collection">
                                                        <input type="hidden" value="{{ preg_replace('/(&(?!.*&))/', '', old('process')) }}" name="process" id="process_collection">
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
