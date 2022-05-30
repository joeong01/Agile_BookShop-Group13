<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminHomeController extends Controller
{
    public function __invoke()
    {
        $totalStock = DB:: select('select * from stock ');
        $totalBook = DB:: select('select count (ISBN_13)
                                from book');
        $categories = DB::select('select b.category, s.stockLevel,
                                count (s.stockLevel) As Total Book
                                from stock s ,book b
                                where b.ISBN_13 = s.ISBN_13
                                group by b.category');
        return view('adminHomepage', compact("totalStock","totalBook", "categories"));
    }

}
