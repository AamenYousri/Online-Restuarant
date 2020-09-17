<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderDetail extends Model
{
    function item(){
        return $this->belongsTo('App\Item');

    }

    function order(){
        return $this->belongsTo('App\order');

    }

}
