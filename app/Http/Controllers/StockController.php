<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class StockController extends Controller
{

    public function __invoke()
    {
        return view('stockLevel');
    }
}