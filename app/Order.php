<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }
    /**
     * Статус оплаты платежа
     *
     * @var array
     */
    /**
     * Оплаченные заказы
     *
     * @param $query
     */
    public function paidOrders($query) {
        $query->where('status', '=', 'true');
    }


}
