@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Создать новую роль</div>
                    <div class="panel-body">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>УПС!</strong>Проверьте введённые данные
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/roles') }}">
                            {{ csrf_field() }}
                                <!--Name-->
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                <div class="col-md-6">
                                    <label for="name" class="col-md-6 control-label">Название роли</label>
                                    <input id="name" type="text" class="form-control" name = 'name' value="{{ old('name') }}" required autofocus>
                                    @if($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                                <!--Display Name-->
                            <div class="form-group {{ $errors->has('display_name') ? 'has-error' : '' }}">
                                <div class="col-md-6">
                                    <label for="display_name" class="col-md-6 control-label">Отображаемое имя</label>
                                    <input id="display_name" name="display_name" class="form-control" value="{{ old('display_name') }}">
                                    @if($errors->has('display_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('display_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                                <!--Description-->
                            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                <div class="col-md-6">
                                    <label for="description">Описание</label>
                                    <textarea rows="6" cols="45" id="description" name="description" class="control-label"></textarea>
                                    @if($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('display_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                                <!--Permissions-->
                            <div class="form-group {{ $errors->has('permissions') ? 'has-error' : '' }}">
                                <div class="col-md-6 checkbox">
                                    <label for="permissions">Права</label> <br>
                                    @foreach($permissions as $key => $permission)
                                        <input type="checkbox" value="{{ $permission }}" name="permissions[]"> {{ $key }} <br>
                                    @endforeach
                                    @if($errors->has('permissions'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('permissions') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <!--Отправка формы и отмена-->
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Создать
                                    </button>
                                    <a class="btn btn-link" href="{{ url('admin/roles')}}">Назад</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection