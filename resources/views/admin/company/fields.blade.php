<div class="row">
    <div class="col-md-4">
        @include('admin.layouts.form.text', [
            'title' => 'Название производителя*',
            'name' => 'title',
            'placeholder' => "Название производителя",
            'value' => $company->title ?? null,
        ])
    </div>
    <div class="col-md-4">
        @include('admin.layouts.form.text', [
            'title' => 'Псевдоним',
            'name' => 'slug',
            'placeholder' => "Псевдоним",
            'value' => $company->slug ?? null,
        ])
    </div>
    <div class="col-md-4">
        @include('admin.layouts.form.filepond-file', [
            'title' => 'Логотип*',
            'name' => 'logo',
            'value' => isset($company) ? $company->getLogo() : null,
        ])
    </div>
</div>
