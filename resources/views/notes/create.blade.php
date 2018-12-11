@extends('layouts.app')
@section('content')
    <h1>Зарузить ноты</h1>
    {!! Form::open(['url' => 'admin/notes', 'files' => 'true', 'enctype' => 'multipart/form-data', 'id' => 'send-form']) !!}
        {{ csrf_field() }}
        <div class="form-group">
            {!!   Form::label('title', 'Название') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('description', 'Описание') !!}
            {!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'textarea']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('wall', 'Главное изображение') !!}
            {!! Form::file('wall') !!}
        </div>
        <div class="form-group">
            {!! Form::label('pdf', 'PDF файл') !!}
            {!! Form::file('pdf') !!}
        </div>
    <div class="form-group">
        {!! Form::label('price', 'Цена') !!}
        {!! Form::number('price', 'value') !!} $
    </div>
        <div class="form-group">
            {!! Form::submit('Отправить', ['class' => 'btn btn-primary form-control']) !!}
        </div>

    {!! Form::close() !!}
@endsection