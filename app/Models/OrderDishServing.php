<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use CoenJacobs\EloquentCompositePrimaryKeys\HasCompositePrimaryKey;

class OrderDishServing extends Model
{
//    use \Awobaz\Compoships\Compoships;
//    use HasCompositePrimaryKey;

    protected $table = 'order_dishserving';
    protected $fillable = ['order_id', 'dish_id', 'serving_id', 'count'];
    protected $primaryKey = array('order_id', 'dish_id', 'serving_id');

    public function order()
    {
        $this->belongsTo('App\Models\Order', 'order_id', 'id');
    }

    public function dishServing()
    {
        return $this->belongsTo('App\Models\DishServing', ['dish_id', 'serving_id'], ['dish_id', 'serving_id']);
    }
}
