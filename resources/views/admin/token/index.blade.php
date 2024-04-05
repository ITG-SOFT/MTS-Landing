@extends('admin.layouts.layout')

@section('title') {{ $title ?? null }} @endsection

@section('content')
    <!-- Content Header (Page header) -->
    @include('admin.layouts.page-header')

    <!-- Main content -->
    <section class="content">
        @if(session()->has('token'))
            <div class="card card-success">
                <div class="card-header">{{ session('token') }}</div>
            </div>
        @endif

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $title ?? null }}</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            @isset($tokens)
                <div class="card-body">
                    <a href="{{ route("admin.tokens.create") }}" class="btn btn-primary mb-3">{{ __('messages.token.create') }}</a>
                    @if(count($tokens))
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover text-wrap">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Название</th>
                                        <th>Токен</th>
                                        <th>Действия</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tokens as $token)
                                        <tr>
                                            <td>{{ $token->id }}</td>
                                            <td>{{ $token->name }}</td>
                                            <td>{{ $token->token }}</td>
                                            <td>
                                                <a href="{{ route("admin.tokens.edit", ['token' => $token->id]) }}" class="btn btn-info btn-sm float-left mr-1">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <form action="{{ route("admin.tokens.destroy", ['token' => $token->id]) }}" method="post" class="float-left">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Подтвердите удаление')">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p>{{ __('messages.token.none') }}</p>
                    @endif
                </div>

                <div class="card-footer clearfix">
                    {{ $tokens->appends(request()->query())->links('vendor.pagination.my-pagination') }}
                </div>
            @endisset
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
