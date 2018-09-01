@extends('layouts.app')
@section('content')
    <h1>Главная страница админки тут </h1>
    <a href="{{ asset('admin/roles') }}">Роли</a>
    <a href="{{ asset('admin/users') }}">Пользователи</a>
    <a href="{{ asset('admin/blog') }}">Блог</a>
@endsection