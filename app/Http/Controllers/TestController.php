<?php

namespace App\Http\Controllers;

use App\Address;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test() {
        dd(Address::first());
    }
}
