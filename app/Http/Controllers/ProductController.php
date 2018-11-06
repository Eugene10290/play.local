<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
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
}
