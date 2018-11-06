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
    <style>
        .item {
            width: 200px;
            height: 300px;
        }
        .btn {
            float: none;
        }
        .price{
            font-weight: bold;
            font-size: 16px;
        }
        .thumbnail .descriprion {
            color: #7f7f7f;
        }
    </style>
    <div class="container">
        <h1>Платные ноты</h1>
        <div class="row">
            @foreach($products as $product)
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img class="img-responsive item" src="{{ asset( $product->imagePath )  }}" alt="...">
                        <div class="caption">
                            <h3>{{ $product->title }}</h3>
                            <p class="descriprion">{{ $product->description }} </p>
                            <div class="clearfix">
                                <div class="pull-left price">${{ $product->price }}</div>
                                <a href="{{ url('/add-to-cart/'. $product->id) }}" class="btn btn-success pull-right" role="button">В корзину</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
