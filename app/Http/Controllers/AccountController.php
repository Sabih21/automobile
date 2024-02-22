<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\Expence;

class AccountController extends Controller
{
    public function index()
    {
        $totalAmount = Income::sum('amount');
        $totalExpence = Expence::sum('amount');

        
        return view('account.index' ,compact('totalAmount' ,'totalExpence'));
        
    }
}
