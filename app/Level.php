<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $table = 'level_admin';

    public function admin() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
