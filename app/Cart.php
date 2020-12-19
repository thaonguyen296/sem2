<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $cart = 'carts';

    public function product() {
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }
}
