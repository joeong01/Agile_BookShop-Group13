<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\DB;

class LoginPageController extends Controller
{

    public function __invoke()
    {
        $users = DB::select('select * from users');
        return view('login', ['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource. 
     * 
     * @return \Illuminate\Http\Response
     */

    public function create(){
        return ('login.create');
    }
}
