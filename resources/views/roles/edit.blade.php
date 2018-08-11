
<?php ?>

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Редактировать роль</div>
                    <div class="panel-body">
                        <!-- Отображение ошибок валидации -->
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Упс!!!</strong> Возникли ошибки с вашим вводом.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="form-horizontal" role="form" method="POST"
                              action="{{ url('admin/roles/'.$role->id) }}">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                                <!--Name-->
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="display_name" class="col-md-4 control-label">Название</label>
                                <div class="col-md-6">
                                    <input id="display_name" type="text" class="form-control" name="display_name"
                                           value="{{$role->display_name}}"
                                           required autofocus>
                                    @if ($errors->has('display_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('display_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                                <!--Description-->
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-4 control-label">Описание</label>
                                <div class="col-md-6">
                                    <textarea rows="4" cols="50" name="description" id="description"
                                              class="form-control">{{$role->description}}</textarea>
                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                                <!--Permissions-->
                            <div class="form-group{{ $errors->has('permissions') ? ' has-error' : '' }}">
                                <label for="permission" class="col-md-4 control-label">Permissions</label>
                                <div class="col-md-6">
                                    @foreach ($permissions as $permission)
                                        <input type="checkbox" value="{{$permission->id}}"
                                               {{in_array($permission->id, $rolePermissions) ? "checked" : null}} name="permissions[]">
                                        {{$permission->display_name}}<br>
                                    @endforeach
                                    @if ($errors->has('permissions'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('permissions') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                                <!--Отправка формы и выход-->
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Обновить
                                    </button>
                                    <a class="btn btn-link" href="{{ url('admin/roles') }}">
                                        Назад
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

