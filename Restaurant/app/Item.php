<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    
    function orders()
    {
        return $this->belongsToMany("App\order" ,"App\orderDetail");
    }

}
