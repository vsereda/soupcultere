<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'dinner_time', 'status', 'execution'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function orderDishServings()
    {
        return $this->hasMany('App\Models\OrderDishServing', 'order_id', 'id');
    }
}
