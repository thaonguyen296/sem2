<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    protected $table = 'manufacturer';

    public $primaryKey ='id';
    // timestamps
    public $timestamps = true;
}
