<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function indexSoup()
    {
        return view('home_soupculture');
    }

    public function menuSoup()
    {
        return view('menu');
    }

    public function deliverySoup()
    {
        return view('delivery');
    }

    public function aboutSoup()
    {
        return view('about');
    }


}
