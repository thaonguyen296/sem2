<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    protected $table = 'trackings';

    public function order()
    {
        return $this->belongsTo('App\Order', 'order_id', 'id');
    }

    public function user()
    {
        return $this->hasOne('App\User','id','shipper');
    }
}
