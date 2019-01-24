@extends('layouts.app')
@section('content')
<link href="{{ asset('public/css/profile/style.css') }}" rel="stylesheet" type="text/css" >
    <div class="container">
        <div class="row">
            <div class="list-orders">
                @if(count($orders) === 0)
                  <h1>Список заказов пуст</h1>
                  @else
                  <h1>История заказов</h1>
                  @foreach($orders as $order)
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="list-group">
                                @foreach($order->cart->items as $item)
                                  <table class="table-list">
                                      <tr>
                                          <td>
                                              <p>Название:</p>
                                          </td>
                                          <td class="name">
                                              <li class="list-group-item">
                                          <span>
                                              {{ $item['price'] }}
                                          </span>
                                                  {{ $item['item']['title'] }}
                                              </li>
                                          </td>
                                          <td>
                                              <a href="{{ url('user/orders/download/'.$item['item']['pdf']) }}">
                                              <div class="button">
                                                  <span>Скачать</span>
                                              </div>
                                              </a>
                                          </td>
                                      </tr>
                                  </table>
                                @endforeach
                            </div>
                        </div>
                        <div class="panel-footer">
                            <strong>Общая стоимость {{ $order->cart->totalPrice }} $</strong>
                        </div>
                    </div>
              @endforeach
            @endif
        </div>
    </div>
@endsection
