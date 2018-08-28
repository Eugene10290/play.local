@extends('layouts.app')
@section('content')
    <div class="container">
        <a class="btn btn-primary" href="{{ url('admin/blog') }}">Назад</a>
        <h1>Создать новость</h1>
        {!! Form::open(['url' => 'admin/blog', 'files' => 'true', 'enctype' => 'multipart/form-data', 'id' => 'send-form']) !!}
        {{ csrf_field() }}
            @include('blog.form._newsForm', ['submitButtonText' => 'Опубликовать', 'publishedDate' => 1])
        {!! Form::close() !!}
    </div>
@endsection