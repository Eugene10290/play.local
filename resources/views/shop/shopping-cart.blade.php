@extends('layouts.app')

@section('content')
<link href="{{ asset('public/css/shop/shoping-cart.css') }}" rel="stylesheet" type="text/css" >
    @if(Session::has('cart'))

        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <ul class="list-group">
                    @foreach($products as $product)
                        <li class="list-group-item">
                            <img class="img-responsive item" src="{{ asset('public/images/uploads/notes/'.$product['item']['wall'] )  }}" alt="...">
                            <span class="badge">К-во: {{ $product['qty'] }}</span>
                            <p class="sheets-title">{{ $product['item']['title'] }}</p>
                            <span class="price">{{ $product['price'] }} $</span>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ url('reduce/'.$product['item']['id']) }}">Уменьшить на 1</a>
                                        <a href="{{ url('remove/'.$product['item']['id']) }}">Удалить</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <strong class="cash">Всего: {{ $totalPrice }} $</strong>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <a href="{{ url('checkout') }}">
                    <div class="button download-btn">
                        <span>Перейти к оплате</span>
                    </div>
                </a>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <h2 class="basket-zero">Ваша корзина пуста</h2>
            </div>
        </div>
    @endif
@endsection