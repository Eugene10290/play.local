@extends('layouts.app')
@section('content')
    <h1>Управление нотами</h1>
    <div class="panel-body">
        <div class="panel-heading">
            <a class="btn btn-success" href="{{ url('admin/notes/create') }}">Загрузить продукт</a>
        </div>
        <table class="table table-striped table-bordered table-condensed">
            <thead>
            <tr>
                <th>id</th>
                <th>Имя</th>
                <th>Описание</th>
                <th>Цена</th>
                <th>Действие</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($notes as $note)
                <tr class="list-users">
                    <td>{{ $note->id }}</td>
                    <td>{{ $note->title }}</td>
                    <td>{{ $note->description }}</td>
                    <td>{{ $note->price }} $</td>
                    <td>
                        <a></a>
                        <a href="{{ url('admin/notes/'.$note->id.'/edit') }}">Редактировать</a>
                        {!! Form::open(['url' => 'admin/notes/'.$note->id, 'action' => 'NotesController@destroy', 'method' => 'DELETE', 'class' => 'admin button'])!!}
                        {!! Form::token() !!}
                        {!! Form::submit('Удалить',
                             [
                                'class' => 'btn btn-danger btn-xs confirm delete',
                                'onclick' => 'return confirm("Удалить статью?")'
                             ])
                         !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection