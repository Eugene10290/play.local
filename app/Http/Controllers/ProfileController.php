<?php

namespace App\Http\Controllers;

use Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Возвращает все заказы пользователя
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        $orders = Auth::user()->orders;

        $orders->transform(function ($order){
            $order->cart = unserialize($order->cart);

            return $order;
        });

        return view('user.profile', compact('orders'));
    }
}
