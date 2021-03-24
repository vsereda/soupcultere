<?php

namespace App\Models;

//use CoenJacobs\EloquentCompositePrimaryKeys\HasCompositePrimaryKey;
use Illuminate\Database\Eloquent\Relations\Pivot;

class DishServing extends Pivot
{
//    use \Awobaz\Compoships\Compoships;
//    use HasCompositePrimaryKey;

    protected $table = 'dish_serving';
    protected $primaryKey = array('dish_id', 'serving_id');

    public function dish()
    {
        return $this->belongsTo('App\Models\Dish');
    }

    public function serving()
    {
        return $this->belongsTo('App\Models\Serving');
    }

    public function orderDishServings()
    {
        return $this->hasMany('App\Models\OrderDishServing', ['dish_id', 'serving_id'], ['dish_id', 'serving_id']);
    }
}
