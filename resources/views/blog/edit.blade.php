@extends('layouts.app')
@section('content')
<link href="{{ asset('public/css/blog-admin/admin-create-blog.css') }}" rel="stylesheet" type="text/css" >
    <div class="container">
        {!! Form::model($blog,['method' => 'PATCH', 'action' => ['BlogController@update', $blog->id], 'enctype' => 'multipart/form-data']) !!}
        {!! Form::token() !!}
        @include('blog.form._newsForm', ['submitButtonText' => 'Обновить', 'publishedDate' => 0])
        {!! Form::close() !!}
    </div>
@endsection