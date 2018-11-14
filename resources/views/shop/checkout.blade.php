@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
            <h1>Подтверждение</h1>
            <h4>Итого к оплате: {{ $total }} $</h4>
            {!! Form::open(['url' => url('checkout') ]) !!}
                    
            {!! Form::close() !!}
        </div>
    </div>
@endsection