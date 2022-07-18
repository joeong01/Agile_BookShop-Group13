<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddBookController extends Controller
{
    public function __invoke()
    {
        return view('add_book');
    }
}
