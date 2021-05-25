<?php

namespace App\Http\Controllers;

use App\Models\Dish;

class DishController extends Controller
{
    public function index(Dish $dish)
    {
        $dish->load('category');
        $dish->load('dishServings.serving');
//        dd($dish);
        return view('dish', compact('dish'));
    }
}
