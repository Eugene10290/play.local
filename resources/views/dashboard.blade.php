@extends('layouts\app')
@section('content')
    <link href="{{ asset('public/css/admin-panel/style.css') }}" rel="stylesheet" type="text/css" >
    <h1>Управление контентом</h1>
    <div class="admin-link">
            <a href="{{ asset('admin/roles') }}" class="role-link">Роли</a>
            <a href="{{ asset('admin/users') }}" class="role-link">Пользователи</a>
            <a href="{{ asset('admin/blog') }}" class="role-link">Блог</a>
            <a href="{{ asset('admin/notes') }}" class="role-link">Ноты</a>

    </div>

@endsection