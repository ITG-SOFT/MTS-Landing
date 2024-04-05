@extends('admin.layouts.layout')

@section('title') {{ $title ?? null }} @endsection

@section('content')
    <!-- Content Header (Page header) -->
    @include('admin.layouts.page-header')

    <!-- Main content -->
    <section class="content">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $title ?? null }}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <a href="{{ route("admin.users.create") }}" class="btn btn-primary mb-3">{{ __('messages.user.create') }}</a>
                @if(count($users))
                    <table id="table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Эл. почта</th>
                                <th>Имя</th>
                                <th>Токен</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->remember_token }}</td>
                                    <td>
                                        <a href="{{ route("admin.users.edit", ['user' => $user->id]) }}" class="btn btn-info btn-sm float-left">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        @if(auth()->user()->is_superadmin)
                                            @if(auth()->id() != $user->id)
                                                <form action="{{ route("admin.users.change-rights", ['user' => $user->id]) }}" method="post" class="float-left ml-1">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-dark btn-sm"
                                                            onclick="return confirm('Подтвердите действие')">
                                                        @if($user->is_superadmin)
                                                            <i class="fas fa-arrow-down"></i>
                                                        @else
                                                            <i class="fas fa-arrow-up"></i>
                                                        @endif
                                                    </button>
                                                </form>
                                                <form action="{{ route("admin.users.destroy", ['user' => $user->id]) }}" method="post" class="float-left ml-1">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Подтвердите удаление')">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>{{ __('messages.user.none') }}</p>
                @endif
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->

    @include('admin.layouts.datatable-script')
@endsection
