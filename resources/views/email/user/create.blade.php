<div>Был создан пользователь на сайте: {{ env('APP_NAME') }}</div>
<div>Ссылка для входа в аккаунт: {{ route('admin.login.show') }}</div>
<div>
    <p>Email: </p>
    <p>{{ $user->email }}</p>
</div>
<div>
    <p>Password: </p>
    <p>{{ $password }}</p>
</div>

