@include('admin.layouts.form.switch', [
    'title' => 'Опубликовать',
    'name' => 'published',
    'default' => true,
    'value' => $article->published ?? null,
])
<div class="row">
    <div class="col-md-4">
        @include('admin.layouts.form.text', [
            'title' => 'Название новости*',
            'name' => 'title',
            'placeholder' => "Название новости",
            'value' => $article->title ?? null,
        ])
    </div>
    <div class="col-md-4">
        @include('admin.layouts.form.text', [
            'title' => 'Псевдоним',
            'name' => 'slug',
            'placeholder' => "Псевдоним",
            'value' => $article->slug ?? null,
        ])
    </div>

{{--    <div class="col-md-4">--}}
{{--        @include('admin.layouts.form.file', [--}}
{{--            'title' => 'Фото*',--}}
{{--            'name' => 'photo',--}}
{{--            'pre_text' => "Выбрать фото",--}}
{{--            'value' => isset($article) ? $article->getPhoto() : null,--}}
{{--        ])--}}
{{--    </div>--}}

    <div class="col-md-4">
        @include('admin.layouts.form.filepond-file', [
            'title' => 'Фото*',
            'name' => 'photo',
            'value' => isset($article) ? $article->getPhoto() : null,
        ])
    </div>
</div>
@include('admin.layouts.form.textarea', [
    'title' => 'Текст новости*',
    'name' => 'text',
    'placeholder' => "Текст новости",
    'value' => $article->text ?? null,
])

{{--@include('admin.layouts.form.filepond-file', [--}}
{{--    'title' => 'Фотографии для галереи',--}}
{{--    'name' => 'photos[]',--}}
{{--    'id' => 'photos',--}}
{{--    'multiple' => true,--}}
{{--])--}}

{{--@include('admin.layouts.form.file', [--}}
{{--    'title' => 'Фотографии для галереи',--}}
{{--    'name' => 'photos[]',--}}
{{--    'pre_text' => "Выбрать фото",--}}
{{--    'multiple' => true,--}}
{{--])--}}
