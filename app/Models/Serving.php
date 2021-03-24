<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Serving extends Model
{
    public function dishServings()
    {
        return $this->hasMany('App\Models\DishServing');
    }

    public function dishes()
    {
        return $this->belongsToMany(
            'App\Models\Dish',
            'dish_serving',
            'serving_id',
            'dish_id'
        )->withPivot('price')->withTimestamps();
    }
}
