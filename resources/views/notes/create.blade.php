@extends('layouts.app')
@section('content')
    <h1>Зарузить ноты</h1>
    {!! Form::open(['url' => 'admin/notes', 'files' => 'true', 'enctype' => 'multipart/form-data', 'id' => 'send-form']) !!}
       @include('notes.form._notesForm', ['submitButtonText' =>'Опубликовать'])
    {!! Form::close() !!}
@endsection