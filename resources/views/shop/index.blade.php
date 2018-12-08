@extends('layouts.app')
@section('cart')
    <li>
        <a href="{{ url('shopping-cart') }}">
            <i class="fa fa-shopping-cart">Корзина</i>
            <span class="badge" style="background-color: red">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
        </a>
    </li>
@endsection
@section('content')
<link href="{{ asset('public/css/shop/style.css') }}" rel="stylesheet" type="text/css" >
    <div class="container">
        <h1 class="sheeps">Платные ноты</h1>
        <div class="row">
            @foreach($products as $product)
                <div class="col-sm-6 col-md-6">
                    <div class="thumbnail">
                        <img class="img-responsive item" src="{{ asset( $product->imagePath )  }}" alt="...">
                        <div class="caption">
                            <h3>{{ $product->title }}</h3>
                            <p class="descriprion">{{ $product->description }} </p>
                            <div class="clearfix">
                                <div class="pull-left price">${{ $product->price }}</div>
                                <a class="button-link pull-right" href="{{ url('/add-to-cart/'. $product->id) }}">
                                    <div class="button download-btn">
                                        <span>В корзину</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
