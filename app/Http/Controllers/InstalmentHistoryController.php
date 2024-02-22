<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Installment;
use App\Models\SaleOrder;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Storage;

class InstalmentHistoryController extends Controller


{

    public function index(){
        
        $saleOrders = SaleOrder::all();
        $vehicles = Vehicle::all();
        return view('instalment_history.index', compact('saleOrders' , 'vehicles'));
    }

    public function create()
    {
        $saleOrder = SaleOrder::all();
        $vehicles = Vehicle::all();
        return view('instalment_history.index', compact('vehicles' , 'saleOrder'));
    }
   // InstalmentHistoryController.php

public function store(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'vehicle_id' => 'required|exists:vehicles,VehicleID',
        'sale_order_id' => 'required|exists:sale_orders,id',
        'amount_p_month' => 'nullable|numeric',
        'remaining_balance' => 'nullable|numeric',
        'recovery_date' => 'nullable|date',
        'file_transfer' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
    ]);

    // Create a new InstalmentHistory instance
    $instalmentHistory = new Installment();
    $instalmentHistory->vehicle_id = $request->vehicle_id;
    $instalmentHistory->sale_order_id = $request->sale_order_id;
    $instalmentHistory->amount_p_month = $request->amount_p_month;
    $instalmentHistory->remaining_balance = $request->remaining_balance;
    $instalmentHistory->recovery_date = $request->recovery_date;

    // Handle file upload for 'file_transfer' field
    if ($request->hasFile('file_transfer')) {
        $file = $request->file('file_transfer');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('instalment_files', $fileName, 'public');
        $instalmentHistory->file_transfer = $filePath;
    }

    // Save the InstalmentHistory instance to the database
    $instalmentHistory->save();

    // You can add a redirect or other response logic here
    return response()->json(['message' => 'Instalment history created successfully']);
}
}

