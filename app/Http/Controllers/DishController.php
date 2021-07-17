<?php

namespace App\Http\Controllers;

use App\Models\Dish;

class DishController extends Controller
{
    public function index(Dish $dish)
    {
        $dish->load('dishServings.serving');
        $dish->load('category');
//        dd($dish);
        return view('dish', compact('dish'));
    }
}
