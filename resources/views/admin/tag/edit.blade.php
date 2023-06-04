@extends('admin.layout.main')

@section('title', 'Admin::Tag - edit')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование тега - {{$tag->title}}</h1>
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
                    <form action="{{ route('admin.tag.update', $tag->slug) }}" method="POST" class="w-25">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <input type="text" value="{{ $tag->title }}" name="title" class="form-control" id="title" placeholder="Название тега">
                        </div>
                        <input type="hidden" name="slug">
                        <input type="submit" class="btn btn-primary" value="Редактировать">
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
