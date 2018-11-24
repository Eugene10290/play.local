<?php

namespace App\Http\Controllers;

use Guzzle\Http\Client;
use Illuminate\Http\Request;
use App\LiqPay;
use App\Cart;

use App\Product;
use Session;


class ProductController extends Controller
{
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
        $html = $this->liqpaySet($total);

        return view('shop.checkout', compact('total','html'));
    }

    public function postCheckout(Request $request) {
        if(!Session::has('cart')) {
            return redirect()->route('shopping-cart');
        }

    }

    private function liqpaySet($total) {
        $public_key = "i14515347728";
        $private_key = "6xlWSk41j2cdtBJvpeZTsnprtnbhAKzkZe0Pixlx";
        $params = [
            'action'         => 'pay',
            'amount'         => $total,
            'currency'       => 'USD',
            'description'    => 'Покупка нот в магазине "Играй с душой" ',
            'order_id'       => 'notes_'.rand(10000, 99999),
            'version'        => '3',
            'sandbox'        => '1',
            'public_key'     => 'i14515347728',
            'result_url'     => 'play.local/success'
        ];
        $liqpay = new LiqPay($public_key, $private_key);
        $html = $liqpay->cnb_form($params);

        return $html;

    }
}
