@extends('admin.layouts.layout')

@section('title') {{ $title ?? null }} @endsection

@section('content')
    <!-- Content Header (Page header) -->
    @include('admin.layouts.page-header')

    <!-- Main content -->
    <section class="content">

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
            @isset($companies)
                <div class="card-body">
                    <a href="{{ route("admin.companies.create") }}" class="btn btn-primary mb-3">{{ __('messages.company.create') }}</a>
                    @if(count($companies))
                        <table id="table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Название</th>
                                    <th>Псевдоним</th>
                                    <th>Логотип</th>
                                    <th>Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($companies as $company)
                                    <tr>
                                        <td>{{ $company->id }}</td>
                                        <td>{{ $company->title }}</td>
                                        <td>{{ $company->slug }}</td>
                                        <td style="text-align: center; background: #303030;">
                                            <img src="{{ $company->getLogo() }}" alt="{{ $company->title }}" style="width: 10vw;">
                                        </td>
                                        <td>
                                            <a href="{{ route("admin.companies.edit", [$company]) }}" class="btn btn-info btn-sm float-left mr-1">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <form action="{{ route("admin.companies.destroy", [$company]) }}" method="post" class="float-left">
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
                    @else
                        <p>{{ __('messages.company.none') }}</p>
                    @endif
                </div>
            @endisset
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->

    @include('admin.layouts.datatable-script')
@endsection
