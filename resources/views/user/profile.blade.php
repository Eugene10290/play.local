@extends('layouts.app')
@section('content')
    @if(count($orders) === 0)
        <h1>Список заказов пуст</h1>
    @else
        <h1>История заказов</h1>
        @foreach($orders as $order)
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="list-group">
                        @foreach($order->cart->items as $item)
                                <li class="list-group-item">
                                        <span>
                                            {{ $item['price'] }}
                                        </span>
                                    {{ $item['item']['title'] }}
                                </li>
                        @endforeach
                    </div>
                </div>
                <div class="panel-footer">
                    <strong>Общая стоимость {{ $order->cart->totalPrice }} $</strong>
                </div>
            </div>
        @endforeach
    @endif
@endsection