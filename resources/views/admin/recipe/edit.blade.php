@extends('admin.layout.main')

@section('title', 'Admin | Recipe - edit')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование рецепта - {{$recipe->title}}</h1>
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
                        <form action="{{ route('admin.recipe.update', $recipe->slug) }}" method="POST"
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

                                <ul id="ingredients_list">
                                    @foreach($ingredients as $ingredient)
                                        <li class="mt-3">
                                            <div class="row align-items-center ingredients" data-index="{{ $dataIndex }}">
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

                                <ul id="process_list">
                                    @foreach($processList as $processItem)
                                        <li class="mt-3">
                                            <div class="row align-items-center process" data-index="{{ $dataIndex }}">
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
