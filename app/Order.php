<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tracking;

class Order extends Model
{
    protected $table = 'order';

    public function tracking() {
        return $this->hasOne('App\Tracking', 'order_id');
    }
}
