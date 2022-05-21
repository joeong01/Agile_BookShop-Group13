<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class UserHomeController extends Controller
{
    public function __invoke()
    {
        $stock = DB:: select('select * from book');
        return view('userHomepage', compact("stock"));
    }
}
