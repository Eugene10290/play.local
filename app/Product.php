<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'description',
        'pdf',
        'wall',
        'price'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
