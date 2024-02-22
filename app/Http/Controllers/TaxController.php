<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tax;
class TaxController extends Controller
{
       public function index(){
        return view('taxes.index');
    }   
        

}