<div class="row">
    <div class="col-md-4">
        @include('admin.layouts.form.text', [
            'title' => 'Фамилия и имя*',
            'name' => 'name',
            'placeholder' => "Фамилия и имя",
            'value' => $feedback->name ?? null,
        ])
    </div>
    <div class="col-md-4">
        @include('admin.layouts.form.number', [
            'title' => 'Рейтинг (макс. 5)*',
            'name' => 'rate',
            'placeholder' => "Рейтинг",
            'value' => $feedback->rate ?? null,
        ])
    </div>
    <div class="col-md-4">
        @include('admin.layouts.form.filepond-file', [
            'title' => 'Фото*',
            'name' => 'photo',
            'value' => isset($feedback) ? $feedback->getPhoto() : null,
        ])
    </div>
</div>

@isset($products)
    @include('admin.layouts.form.select', [
        'title' => 'На какой продукт отзыв*',
        'name' => 'product_id',
        'pre_text' => 'Выберите продукт',
        'items' => $products,
        'value' => $feedback->product_id ?? null,
    ])
@endisset

@include('admin.layouts.form.textarea', [
    'title' => 'Текст*',
    'name' => 'text',
    'placeholder' => "Текст",
    'value' => $feedback->text ?? null,
])
