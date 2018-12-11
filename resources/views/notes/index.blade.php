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
                        <a href="#">Редактировать</a>
                        <a href="#">Удалить</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection