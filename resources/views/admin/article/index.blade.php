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
            @isset($articles)
                <div class="card-body">
                    <a href="{{ route("admin.articles.create") }}" class="btn btn-primary mb-3">{{ __('messages.article.create') }}</a>
                    @if(count($articles))
                        <table id="table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Название</th>
                                    <th>Псевдоним</th>
                                    <th>Фото</th>
                                    <th>Фотографии</th>
                                    <th>Дата создания</th>
                                    <th>Дата обновления</th>
                                    <th>Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($articles as $article)
                                    <tr>
                                        <td>{{ $article->id }}</td>
                                        <td>{{ $article->title }}</td>
                                        <td>{{ $article->slug }}</td>
                                        <td style="text-align: center; background: #303030;">
                                            <img src="{{ $article->getPhoto() }}" alt="{{ $article->title }}" style="width: 10vw;">
                                        </td>
                                        @include('admin.photo.index-td', [
                                            'photos' => $article->photos,
                                        ])
                                        <td>{{ $article->getCreatedAt() }}</td>
                                        <td>{{ $article->getUpdatedAt() }}</td>
                                        <td>
                                            <form action="{{ route("admin.articles.publish", [$article]) }}" method="post" class="float-left mr-1">
                                                @csrf
                                                @method('PATCH')
                                                @if($article->published)
                                                    <button type="submit" class="btn btn-success btn-sm">
                                                        <i class="fas fa-check"></i>
                                                    </button>
                                                @else
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-xmark"></i>
                                                    </button>
                                                @endif
                                            </form>
                                            <a href="{{ route("admin.articles.edit", [$article]) }}" class="btn btn-info btn-sm float-left mr-1">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <form action="{{ route("admin.articles.destroy", [$article]) }}" method="post" class="float-left">
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
                        <p>{{ __('messages.article.none') }}</p>
                    @endif
                </div>
            @endisset
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->

    @include('admin.layouts.datatable-script')
@endsection
