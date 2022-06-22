<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


class LogOutController extends Controller
{

    public function __invoke()
    {
        return view('logout');
    }

}