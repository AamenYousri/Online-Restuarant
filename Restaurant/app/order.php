<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    
 
    function orderDetails()
    {
        return $this->hasMany("App\orderDetail");
    }
    function item()
    {
        return $this->belongsToMany("App\Item" ,"App\orderDetail");
    }
    function user()
    {
        return $this->belongsTo("App\User" );
    }

}
