@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Информаия о роли</div>

                    <div class="panel-body">


                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Имя</label>
                            {{ $role->display_name }}
                        </div>


                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Описание</label>
                            {{ $role->description }}
                        </div>


                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Права</label>
                            @if(!empty($permissions))
                                <div class="col-md-8 control-label">
                                    @foreach($permissions as $permission)
                                        <label class="badge badge-success" style="float: left; margin-right: 5px">{{ $permission->display_name }}</label>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

