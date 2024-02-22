<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expence;
use App\Models\Income;
use App\Models\Vehicle;
use App\Models\PurchaseOrder;

class IndexController extends Controller
{
   public function index()
   {
      $totalAmount = Income::sum('amount');
      $total_vehicle = Vehicle::all()->count();
      $total_purchase = PurchaseOrder::all()->count();


      $totalExpence = Expence::sum('amount');
      return view('dashboard', compact('totalAmount', 'totalExpence', 'total_vehicle', 'total_purchase'));
   }
}
