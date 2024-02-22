<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use App\Models\Vehicle;
use App\Models\Customer;
use App\Models\SaleOrder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class SaleOrderController extends Controller
{
    public function show()
    {
        $saleOrders = SaleOrder::paginate(10);
        $vehicles = Vehicle::all();
        return view('sales.show', compact('saleOrders', 'vehicles'));
    }
    public function index()
    {
        $saleOrders = SaleOrder::with('vehicle')->get();
        $vehicles = Vehicle::all();
        $customers = Customer::all();
        return view('sales.index', compact('saleOrders', 'vehicles', 'customers'));
    }

    public function store(Request $request)
    {

        $saleOrder = new SaleOrder;

        $saleOrder->vehicle_id = $request->input('vehicle_id');
        $saleOrder->customer_id = $request->input('customer_id');

        $saleOrder->serial_of_reg_book = $request->input('serial_of_reg_book');
        $saleOrder->serial_of_reg_challan = $request->input('serial_of_reg_challan');
        $saleOrder->owner_address = $request->input('owner_address');
        $saleOrder->deal_locked = $request->input('deal_locked');
        $saleOrder->balance_inspection = $request->input('balance_inspection');
        $saleOrder->owner_name = $request->input('owner_name');
        $saleOrder->car_touchups = $request->input('car_touchups');

        $saleOrder->regd_book_date = $request->input('regd_book_date');
        $saleOrder->regd_file_date = $request->input('regd_file_date');
        $saleOrder->documents_date = $request->input('documents_date');

        $saleOrder->jackrod = $request->has('jackrod');
        $saleOrder->wheels_caps = $request->has('wheels_caps');
        $saleOrder->service_book = $request->has('service_book');
        $saleOrder->tape_recorder = $request->has('tape_recorder');
        $saleOrder->spare_wheel = $request->has('spare_wheel');
        $saleOrder->warranty_books = $request->has('warranty_books');
        $saleOrder->lighter = $request->has('lighter');
        $saleOrder->air_conditioner = $request->has('air_conditioner');

        $saleOrder->remarks = $request->input('remarks');
        $saleOrder->advance_rs = $request->input('advance_rs');
        $saleOrder->balance_rs = $request->input('balance_rs');
        $saleOrder->balance_paid = $request->input('balance_paid');
        $saleOrder->installment_amount = $request->input('installment_amount');
        $saleOrder->paid_amount = $request->input('paid_amount');

        $saleOrder->save();
        $this->storeImages($saleOrder, $request->file('sale_car_image'), 'public/storage/sale/car', 'sale_car');
        $this->storeImages($saleOrder, $request->file('sale_cplc_image'), 'public/storage/sale/cplc', 'sale_cplc');
        $this->storeImages($saleOrder, $request->file('sale_vehicle_image'), 'public/storage/sale/vehicle', 'sale_vehicle');
        $this->storeImages($saleOrder, $request->file('sale_seller_cnic_image'), 'public/storage/sale/seller_cnic', 'sale_seller_cnic');
        $this->storeImages($saleOrder, $request->file('sale_buyer_cnic_image'), 'public/storage/sale/buyer_cnic', 'sale_buyer_cnic');

        return redirect()->route('sales.index')->with('success', 'Sales Order created successfully!');

    }
    private function storeImages($sale, $images, $storagePath, $type)
    {
        if ($images) {
            foreach ($images as $image) {
                $filePath = $image->store("public/storage/sale/$type", 'public');

                Log::info("Image stored at: $filePath for type $type");

                $sale->images()->create([
                    'type' => $type,
                    'path' => $filePath,
                ]);
            }
        }
    }

    public function create()
    {
        $vehicles = Vehicle::all();
        $customers = Customer::all();
        return view('sales.create', compact('vehicles', 'customers'));
    }

    public function edit($id)
    {
        $saleOrders = SaleOrder::find($id);
        $vehicles = Vehicle::all();
        $customers = Customer::all();
        return view('sales.edit', compact('saleOrders', 'vehicles', 'customers'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'vehicle_id' => 'required',
            'customer_id' => 'required',
        ]);

        $saleOrder = SaleOrder::findOrFail($id);

        $saleOrder->fill([
            'vehicle_id' => $request->input('vehicle_id'),
            'customer_id' => $request->input('customer_id'),
            'serial_of_reg_book' => $request->input('serial_of_reg_book'),
            'serial_of_reg_challan' => $request->input('serial_of_reg_challan'),
            'deal_locked' => $request->input('deal_locked'),
            'balance_inspection' => $request->input('balance_inspection'),
            'owner_name' => $request->input('owner_name'),
            'car_touchups' => $request->input('car_touchups'),
            'balance_rs' => $request->input('balance_rs'),
            'advance_rs' => $request->input('advance_rs'),
            'balance_paid' => $request->input('balance_paid'),

            'regd_book_date' => $request->input('regd_book_date'),
            'regd_file_date' => $request->input('regd_file_date'),
            'documents_date' => $request->input('documents_date'),

            'jackrod' => $request->has('jackrod'),
            'wheels_caps' => $request->has('wheels_caps'),
            'service_book' => $request->has('service_book'),
            'tape_recorder' => $request->has('tape_recorder'),
            'spare_wheel' => $request->has('spare_wheel'),
            'warranty_books' => $request->has('warranty_books'),
            'lighter' => $request->has('lighter'),
            'air_conditioner' => $request->has('air_conditioner'),
            'remarks' => $request->input('remarks'),
            'no_of_installment' => $request->has('no_of_installment'),
            'installment_amount' => $request->has('installment_amount'),
            'paid_amount' => $request->input('paid_amount'),
        ]);

        $saleOrder->save();

        $this->storeImages($saleOrder, $request->file('sale_car_image'), 'public/storage/sale/car', 'sale_car');
        $this->storeImages($saleOrder, $request->file('sale_cplc_image'), 'public/storage/sale/cplc', 'sale_cplc');
        $this->storeImages($saleOrder, $request->file('sale_vehicle_image'), 'public/storage/sale/vehicle', 'sale_vehicle');
        $this->storeImages($saleOrder, $request->file('sale_seller_cnic_image'), 'public/storage/sale/seller_cnic', 'sale_seller_cnic');
        $this->storeImages($saleOrder, $request->file('sale_buyer_cnic_image'), 'public/storage/sale/buyer_cnic', 'sale_buyer_cnic');

        return redirect()->route('sales.index')->with('success', 'Sale Order updated successfully');
    }


    public function detail($id): View
    {
        $saleOrder = saleOrder::findOrFail($id);
        $images = $saleOrder->images;

        return view('sales.detail', compact('saleOrder', 'images'));
    }

    public function destroy($id)
    {

        $saleOrders = SaleOrder::findorFail($id);
        $saleOrders->delete();
        return redirect()->route('sales.index')->with('success', 'The Sale Order is deleted!');
    }


}
