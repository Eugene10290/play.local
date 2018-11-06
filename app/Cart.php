<?php

namespace App;

class Cart
{
    public $items = null;
    public  $totalQty = 0;
    public $totalPrice = 0;

    /**
     * Cart конструктор.
     *
     * @param $oldCart
     */
    public function __construct($oldCart)
    {
        if($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    /**
     * Функция добавления товара в корзину.
     *
     * @param $item
     * @param $id
     */
    public function add($item, $id) {
        $storedItems = [
            'qty' => 0,
            'price' => $item->price,
            'item' => $item
        ];

        if($this->items){
            if(array_key_exists($id, $this->items)){ //если уже имеется этот item в корзине
                $storedItems = $this->items[$id];
            }
        }
        $storedItems['qty']++;
        $storedItems['price'] = $item->price * $storedItems['qty'];
        $this->items[$id] = $storedItems;
        $this->totalQty++;
        $this->totalPrice += $item->price;
    }
}
