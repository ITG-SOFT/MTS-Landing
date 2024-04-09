@include('admin.layouts.form.text', [
    'title' => 'Название свойства*',
    'name' => 'title',
    'placeholder' => "Название свойства",
    'value' => $attribute->title ?? null,
])
