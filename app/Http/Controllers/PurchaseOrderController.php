<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PurchaseOrder;

class PurchaseOrderController extends Controller
{


public function store(Request $request)
{
    // $request->validate([
    //     // Add validation rules for each field
    //     'membership_no' => 'required|string',
    //     'make' => 'required|string',
    //     'model' => 'required|string',
    // ]);

    $purchaseOrder = new PurchaseOrder;

    $purchaseOrder->membership_no = $request->input('membership_no');
    $purchaseOrder->make = $request->input('make');
    $purchaseOrder->model = $request->input('model');
    $purchaseOrder->regis_no = $request->input('regis_no');
    $purchaseOrder->serial_of_reg_book = $request->input('serial_of_reg_book');
    $purchaseOrder->engine_no = $request->input('engine_no');
    $purchaseOrder->chassis_no = $request->input('chassis_no');
    $purchaseOrder->colour = $request->input('colour');
    $purchaseOrder->serial_of_reg_challan = $request->input('serial_of_reg_challan');
    $purchaseOrder->deal_locked = $request->input('deal_locked');
    
    $purchaseOrder->regd_book_date = $request->input('regd_book_date');
    $purchaseOrder->regd_file_date = $request->input('regd_file_date');
    $purchaseOrder->documents_date = $request->input('documents_date');

    $purchaseOrder->jackrod = $request->has('jackrod');
    $purchaseOrder->wheels_caps = $request->has('wheels_caps');
    $purchaseOrder->service_book = $request->has('service_book');
    $purchaseOrder->tape_recorder = $request->has('tape_recorder');
    $purchaseOrder->spare_wheel = $request->has('spare_wheel');
    $purchaseOrder->warranty_books = $request->has('warranty_books');
    $purchaseOrder->lighter = $request->has('lighter');
    $purchaseOrder->air_conditioner = $request->has('air_conditioner');

    $purchaseOrder->remarks = $request->input('remarks');

  
    // $purchaseOrder->car_image = $request->file('car_image')->store('images');
dd($purchaseOrder);
    $purchaseOrder->save();

    return redirect()->route('purchase_orders.index')->with('success', 'Purchase Order created successfully!');
}

public function create(){
    return view('purchase.create');
}

public function edit(){
    return view('purchase.edit');
}
}
