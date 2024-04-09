<div class="row">
    <div class="col-md-6">
        @include('admin.layouts.form.text', [
            'title' => 'Название*',
            'name' => 'title',
            'placeholder' => "Название",
            'value' => $product->title ?? null,
        ])
    </div>
    <div class="col-md-6">
        @include('admin.layouts.form.text', [
            'title' => 'Псевдоним',
            'name' => 'slug',
            'placeholder' => "Псевдоним",
            'value' => $product->slug ?? null,
        ])
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        @isset($categories)
            @include('admin.layouts.form.select', [
                'title' => 'Категория*',
                'name' => 'category_id',
                'pre_text' => 'Выберите категорию',
                'items' => $categories,
                'value' => $product->category_id ?? null,
            ])
        @endisset
    </div>
    <div class="col-md-6">
        @isset($companies)
            @include('admin.layouts.form.select', [
                'title' => 'Компания*',
                'name' => 'company_id',
                'pre_text' => 'Выберите компанию',
                'items' => $companies,
                'value' => $product->company_id ?? null,
            ])
        @endisset
    </div>
</div>

@include('admin.layouts.form.filepond-file', [
    'title' => 'Фото*',
    'name' => 'photo',
    'value' => isset($product) ? $product->getPhoto() : null,
])

<div class="row">
    <div class="col-md-6">
        @include('admin.layouts.form.text', [
            'title' => 'Цена*',
            'name' => 'price',
            'placeholder' => "Цена",
            'value' => $product->price ?? null,
        ])
    </div>
    <div class="col-md-6">
        @include('admin.layouts.form.text', [
            'title' => 'Цена со скидкой',
            'name' => 'sale_price',
            'placeholder' => "Цена со скидкой",
            'value' => $product->sale_price ?? null,
        ])
    </div>
</div>

@foreach($product->category->attributes as $attribute)
    @php
        $attribute_value = $product->attributeValues()->where('attribute_id', $attribute->id)->first();
    @endphp

    @include('admin.layouts.form.text', [
        'title' => $attribute->title,
        'name' => "attributes[{$attribute->id}]",
        'placeholder' => $attribute->title,
        'value' => $attribute_value->value ?? null,
    ])
@endforeach
