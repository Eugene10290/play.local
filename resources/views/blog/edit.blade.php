@extends('layouts.app')
@section('content')
    <div class="container">
        {!! Form::model($blog,['method' => 'PATCH', 'action' => ['BlogController@update', $blog->id], 'enctype' => 'multipart/form-data']) !!}
        {!! Form::token() !!}
        @include('blog.form._newsForm', ['submitButtonText' => 'Обновить', 'publishedDate' => 0])
        {!! Form::close() !!}
    </div>
@endsection