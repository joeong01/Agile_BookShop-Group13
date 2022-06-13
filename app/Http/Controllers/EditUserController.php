<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditUserController extends Controller
{
    public function __invoke(){
        return view('edit_user');
    }
}
