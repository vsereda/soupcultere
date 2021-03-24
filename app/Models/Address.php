<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';
    protected $fillable = ['description', 'confirmed'];

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
}
