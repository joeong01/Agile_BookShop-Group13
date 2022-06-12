<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{

    public function __invoke()
    {
        $users = DB::select('select * from users');
        return view('register', compact("users"));
    }
}
