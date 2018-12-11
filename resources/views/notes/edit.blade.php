@extends('layouts.app')
@section('content')
    {!! Form::model($product,['method' => 'PATCH', 'action' => ['NotesController@update', $product->id], 'enctype' => 'multipart/form-data']) !!}
        {{ csrf_field() }}
        @include('notes.form._notesForm', ['submitButtonText' => 'Обновить'])
    {!! Form::close() !!}
@endsection