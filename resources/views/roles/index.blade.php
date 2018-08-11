@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading"><h1>Управление Ролями</h1></div>
          <div class="panel-heading">
              <a class="btn btn-success" href="{{ url('admin/roles/create') }}">Создать роль</a>
          </div>
          <div class="panel-body">
            <table class="table table-striped table-bordered table-condensed">
              <thead>
                <tr>
                  <th>id</th>
                  <th>Имя</th>
                  <th>Описание</th>
                  <th>Действие</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($roles as $key => $role)
                  <tr class="list-users">
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->display_name }}</td>
                    <td>{{ $role->description }}</td>
                    <td>
                      <a class="btn btn-info" href="{{ route('roles.show', $role->id) }}">Просмотреть</a>
                      <a class="btn btn-primary" href="{{ route('roles.edit', $role->id) }}">Редактировать</a>
                        <form action="{{ url('admin/roles/'.$role->id) }}" method="POST" style="display: inline-block" >
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="submit" id="delete-task-{{ $role->id }}" class="btn btn-danger">
                                <i class="fa fa-btn fa-trash"></i>Delete
                            </button>
                        </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
