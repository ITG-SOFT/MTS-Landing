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
            @isset($products)
                <div class="card-body">
                    <a href="{{ route("admin.products.create") }}" class="btn btn-primary mb-3">{{ __('messages.product.create') }}</a>
                    @if(count($products))
                        <table id="table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Название</th>
                                    <th>Фото</th>
                                    <th>Категория</th>
                                    <th>Компания</th>
                                    <th>Цена</th>
                                    <th>Фотографии</th>
                                    <th>Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->title }}</td>
                                        <td style="text-align: center; background: #303030;">
                                            <img src="{{ $product->getPhoto() }}" alt="{{ $product->title }}" style="width: 10vw;">
                                        </td>
                                        <td>{{ $product->category }}</td>
                                        <td>{{ $product->company }}</td>
                                        <td>
                                            {{ $product->sale_price ?? $product->price }}
                                            @if($product->sale_price)
                                                <p style="text-decoration: line-through;">{{ $product->price }}</p>
                                            @endif
                                        </td>
                                        @include('admin.photo.index-td', [
                                            'photos' => $product->photos,
                                        ])
                                        <td>
                                            <a href="{{ route("admin.products.edit", [$product]) }}" class="btn btn-info btn-sm float-left mr-1">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <form action="{{ route("admin.products.destroy", [$product]) }}" method="post" class="float-left">
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
                        <p>{{ __('messages.product.none') }}</p>
                    @endif
                </div>
            @endisset
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->

    @include('admin.layouts.datatable-script')
@endsection
