<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class AdminHomeController extends Controller
{
    public function __invoke()
    {
        $stock = DB:: select('select b.ISBN_13, b.bookName, s.stockLevel
                                from stock s ,book b
                                where b.ISBN_13 = s.ISBN_13');
        $type = "Admin";
        return view('adminHomepage', compact("stock","type"));
    }
}
