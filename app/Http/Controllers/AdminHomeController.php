<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminHomeController extends Controller
{
    public function __invoke()
    {
        $totalStock = DB:: select('select * from stock;');
        $categories = DB::select('select bookCategory, 
                                COUNT(*) as book
                                from book
                                group by bookCategory;');
        return view('adminHomepage', compact("totalStock", "categories"));
    }

}
