@extends('admin.layout.main')

@section('title', 'Admin | Tag - single')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $tag->title }}</h1>
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
                <div class="col-3 mb-3">
                    <a href="{{ route('admin.tag.index') }}" type="button" class="btn btn-block btn-primary">Назад</a>
                </div>
                <div class="col-3 mb-3">
                    <a href="{{ route('admin.tag.edit', $tag->slug) }}" type="button" class="btn btn-block btn-success">Редактировать</a>
                </div>
                <div class="col-3 mb-3">
                    <form action="{{ route('admin.tag.delete', $tag->slug) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-block btn-danger">Удалить</button>
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
