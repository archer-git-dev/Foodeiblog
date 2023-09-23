@extends('admin.layout.main')

@section('title', 'Admin | Recipe - create')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавление рецепта</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-6">
                        @include('admin.includes.errors')
                    </div>
                    <div class="col-12">
                        <form action="{{ route('admin.recipe.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group w-25">
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
                                    @endphp

                                    <ul id="ingredients_list">
                                    @foreach($ingredients as $ingredient)
                                        <li class="mt-3">
                                            <div class="row align-items-center ingredients">
                                                <span>{{ $ingredient }}</span>
                                                <div class="btn btn-warning ml-2 edit_btn" onclick="deleteFromList(this, 'edit')">Редактировать</div>
                                                <div class="btn btn-danger ml-2 delete_btn" onclick="deleteFromList(this)">Удалить</div>
                                            </div>
                                        </li>
                                    @endforeach
                                    </ul>

                                @else
                                    <ul id="ingredients_list"></ul>
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
                                    @endphp

                                    <ul id="process_list">
                                    @foreach($processList as $processItem)
                                        <li class="mt-3">
                                            <div class="row align-items-center process">
                                                <span>{{ $processItem }}</span>
                                                <div class="btn btn-warning ml-2 edit_btn" onclick="deleteFromList(this, 'edit')">Редактировать</div>
                                                <div class="btn btn-danger ml-2 delete_btn" onclick="deleteFromList(this)">Удалить</div>
                                            </div>
                                        </li>
                                    @endforeach
                                    </ul>

                                @else
                                    <ul id="process_list"></ul>
                                @endif


                            </div>
                            <div class="form-group w-50">
                                <label>Добавить изображение (необязательно)</label>
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
                            <div class="form-group w-25">
                                <label>Выберите категорию рецепта</label>
                                <select name="category_id" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == old('category_id') ? 'selected' : '' }}
                                        >{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group w-50">
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
                                <input type="hidden" value="1" name="is_visible"/>
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
    <!-- /.content-wrapper -->
@endsection
