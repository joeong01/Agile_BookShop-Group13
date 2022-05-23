<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class ShoppingCartController extends Controller
{
    public function __invoke()
    {
        return view('shoppingCartItems');
    }
}

