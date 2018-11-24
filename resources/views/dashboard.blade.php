@extends('layouts\app')
@section('content')
    <link href="{{ asset('public/css/admin-panel/style.css') }}" rel="stylesheet" type="text/css" >
    <h1>Главная страница админки</h1>
    <div class="admin-link">
            <a href="{{ asset('admin/roles') }}" class="role-link">Роли</a>
            <a href="{{ asset('admin/users') }}" class="role-link">Пользователи</a>
            <a href="{{ asset('admin/blog') }}" class="role-link">Блог</a>
    </div>

@endsection