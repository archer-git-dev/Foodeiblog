@extends('admin.layout.main')

@section('title', 'Admin | User - read')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Список пользователей</h1>
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
                    <a href="{{ route('admin.user.create') }}" type="button" class="btn btn-block btn-primary">Добавить</a>
                </div>
                <div class="col-3 mb-3">
                    <a href="{{ route('admin.user.not_verified') }}" type="button" class="btn btn-block btn-primary">Удалить неподтвержденные аккаунты</a>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Имя пользователя</th>
                                    <th colspan="3" class="text-center">Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.user.show', $user->slug) }}">
                                                <i class="far fa-eye"></i>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a class="text-success" href="{{ route('admin.user.edit', $user->slug) }}">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <form action="{{ route('admin.user.delete', $user->slug) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="border-0 bg-transparent">
                                                    <i class="fas fa-trash text-danger" role="button"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
