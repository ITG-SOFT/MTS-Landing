@extends('admin.layouts.layout')

@section('title') {{ $title ?? null }} @endsection

@section('content')
    <!-- Content Header (Page header) -->
    @include('admin.layouts.page-header')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                @isset($article_count)
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-gradient-secondary">
                            <div class="inner">
                                <h3>{{ $article_count }}</h3>

                                <p>{{ __('messages.article.plural') }}</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-newspaper"></i>
                            </div>
                            <a href="<?=route('admin.articles.index')?>" class="small-box-footer">{{ __('messages.more') }} <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                @endisset
                @isset($feedback_count)
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-teal">
                            <div class="inner">
                                <h3>{{ $feedback_count }}</h3>

                                <p>{{ __('messages.feedback.plural') }}</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-message"></i>
                            </div>
                            <a href="<?=route('admin.feedbacks.index')?>" class="small-box-footer">{{ __('messages.more') }} <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                @endisset
                @isset($category_count)
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>{{ $category_count }}</h3>

                                <p>{{ __('messages.category.plural') }}</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-layer-group"></i>
                            </div>
                            <a href="<?=route('admin.categories.index')?>" class="small-box-footer">{{ __('messages.more') }} <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                @endisset
                @isset($company_count)
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-orange">
                            <div class="inner">
                                <h3>{{ $company_count }}</h3>

                                <p>{{ __('messages.company.plural') }}</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-building"></i>
                            </div>
                            <a href="<?=route('admin.companies.index')?>" class="small-box-footer">{{ __('messages.more') }} <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                @endisset
            </div>
            @if(auth()->user()->is_superadmin)
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    @isset($token_count)
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-blue">
                                <div class="inner">
                                    <h3>{{ $token_count }}</h3>

                                    <p>{{ __('messages.token.plural') }}</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-solid fa-key"></i>
                                </div>
                                <a href="<?=route('admin.tokens.index')?>" class="small-box-footer">{{ __('messages.more') }} <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    @endisset
                    @isset($user_count)
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-gray">
                                <div class="inner">
                                    <h3>{{ $user_count }}</h3>

                                    <p>{{ __('messages.user.plural') }}</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-solid fa-user"></i>
                                </div>
                                <a href="<?=route('admin.users.index')?>" class="small-box-footer">{{ __('messages.more') }} <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    @endisset
                </div>
                <!-- /.row -->
            @endif
        </div><!-- /.container-fluid -->
    </section>
@endsection
