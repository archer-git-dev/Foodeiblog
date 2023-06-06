@extends('admin.layout.main')

@section('title', 'Admin::User - create')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавление пользователя</h1>
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
                    <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group w-25">
                            <input type="text" value="{{ old('username') }}" name="username" class="form-control"  placeholder="Имя пользователя">
                        </div>
                        <div class="form-group w-25">
                            <input type="email" value="{{ old('email') }}" name="email" class="form-control"  placeholder="E-mail пользователя">
                        </div>
                        <div class="form-group w-25">
                            <input type="text" value="{{ old('password') }}" name="password" class="form-control"  placeholder="Пароль пользователя">
                        </div>
                        <div class="form-group w-25">
                            <label>Аватар пользователя (необязательно)</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="avatar">
                                    <label class="custom-file-label">Выберите изображение</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Загрузка</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group w-25">
                            <label>Выберите роль пользователя</label>
                            <select name="role" class="form-control">
                                <option {{ old('role') == 'user' ? 'selected' : '' }} value="user">user</option>
                                <option {{ old('role') == 'admin' ? 'selected' : '' }} value="admin">admin</option>
                            </select>
                        </div>
                        <input type="hidden" name="slug">
                        <input type="submit" class="btn btn-primary" value="Добавить">
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
