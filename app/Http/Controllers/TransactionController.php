<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function __invoke()
    {
        $payment = DB:: select('select * from payment');
        return view('transaction', compact("payment"));
    }
}
