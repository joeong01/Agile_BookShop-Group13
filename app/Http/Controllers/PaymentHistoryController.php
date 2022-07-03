<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class PaymentHistoryController extends Controller
{
    public function __invoke()
    {
        $id = session()->get('id') ;
        $history = DB::select('SELECT * FROM invoice where userID = '.$id.'');
        $books = DB::select('SELECT * FROM invoicedetails JOIN book ON invoicedetails.ISBN_13 = book.ISBN_13 ');
        return view('paymentHistory', compact("history","books"));
    }
}