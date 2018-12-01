<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LiqPay;
use App\Cart;
use App\Order;
use App\User;
use Auth;

use App\Product;
use Session;



class ProductController extends Controller
{

    const PUBLIC_KEY = 'i14515347728';
    const PRIVATE_KEY = '6xlWSk41j2cdtBJvpeZTsnprtnbhAKzkZe0Pixlx';
    /**
     * Возвоащает view со списком товаров
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {

        $products = Product::all();

        return view('shop.index', compact('products'));
    }
    /**
     * Функция помещает данный товар в корзину
     *
     * @param Request $request
     * @param $id - id товара
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function getAddToCart(Request $request, $id) {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);

        return redirect('shops');
    }
    /**
     * Отображение корзины со списком товаров
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCart(){
        if(!Session::has('cart')) {
            return view('shop.shopping-cart', compact('products'));
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $totalPrice = $cart->totalPrice;
        $products = $cart->items;

        return view('shop.shopping-cart', compact('products', 'totalPrice'));
    }
    /**
     * Отправка на страницу оплаты и передача общей стоимости товаров
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCheckout() {
        if(!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        $order_id = 'order_'.rand(10000, 99999);
        $html = $this->liqpaySet($total, $order_id);

        $order = new Order();
        $order->cart = serialize($cart); //объект в строку для хранения в бд
        $order->order_id = $order_id;
        $order->total = $total;
        Auth::user()->orders()->save($order);

        return view('shop.checkout', compact('total','html'));
    }

    public function paymentStatus() {
        $lastOrder = Auth::user()->orders()->orderBy('id','desc')->first();
        $order_id = $lastOrder->order_id;

        $liqpay = new LiqPay(self::PUBLIC_KEY, self::PRIVATE_KEY);

        $res = $liqpay->api("request", array(
            'action'        => 'status',
            'version'       => '3',
            'order_id'      => $order_id
        ));

        if($res->status === 'sandbox'){ //Если оплата прошла успешно
            $lastOrder->status = true;
            $lastOrder->save();
            return redirect('order_history')->with('message','Успешная оплата');
        }
    }

    /**
     * Формирование формы для проведения оплаты LiqPay
     *
     * @param $total
     * @param $order_id
     * @return string
     */
    private function liqpaySet($total, $order_id) {
        $params = [
            'action'         => 'pay',
            'amount'         => $total,
            'currency'       => 'USD',
            'description'    => 'Покупка нот в магазине "Играй с душой" ',
            'order_id'       => $order_id,
            'version'        => '3',
            'sandbox'        => '1',
            'public_key'     =>  self::PUBLIC_KEY,
            'result_url'     => 'play.local/status'
        ];
        $liqpay = new LiqPay(self::PUBLIC_KEY, self::PRIVATE_KEY);
        $html = $liqpay->cnb_form($params);

        return $html;
    }
}
