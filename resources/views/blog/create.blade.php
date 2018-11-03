@extends('layouts.app')
@section('content')
<link href="{{ asset('public/css/blog-admin/admin-create-blog.css') }}" rel="stylesheet" type="text/css" >
    <div class="container">
        <a class="btn btn-primary back" href="{{ url('admin/blog') }}">Назад</a>
        <h1 class="create_news_btn">Создать новость</h1>
        {!! Form::open(['url' => 'admin/blog', 'files' => 'true', 'enctype' => 'multipart/form-data', 'id' => 'send-form']) !!}
        {{ csrf_field() }}
            @include('blog.form._newsForm', ['submitButtonText' => 'Опубликовать', 'publishedDate' => 1])
        {!! Form::close() !!}
    </div>
@endsection