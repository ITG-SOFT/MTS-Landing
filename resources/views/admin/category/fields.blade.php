<div class="row">
    <div class="col-md-4">
        @include('admin.layouts.form.text', [
            'title' => 'Название*',
            'name' => 'title',
            'placeholder' => "Название",
            'value' => $category->title ?? null,
        ])
    </div>
    <div class="col-md-4">
        @include('admin.layouts.form.text', [
            'title' => 'Псевдоним',
            'name' => 'slug',
            'placeholder' => "Псевдоним",
            'value' => $category->slug ?? null,
        ])
    </div>
    <div class="col-md-4">
        @include('admin.layouts.form.filepond-file', [
            'title' => 'Фото*',
            'name' => 'photo',
            'value' => isset($category) ? $category->getLogo() : null,
        ])
    </div>
</div>
