<?php

namespace App\Http\Controllers;

use Auth;
use User;

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

        $orders = Auth::user()->orders->where('status','=', '1'); //отображение только оплаченных заказов
        $orders->transform(function ($order){
            $order->cart = unserialize($order->cart);

            return $order;
        });

        return view('user.profile', compact('orders'));
    }

    /**
     * Формирование ссылки для загрузки нот
     *
     * @param $name
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function downloadPdf($name) {
        $path = storage_path('app\notes/'.$name);

        return response()->download($path);
    }
}
