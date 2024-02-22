<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PurchaseOrder;
use Illuminate\Support\Facades\DB;
use App\Models\PurchaseOrderImage;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator; // Add this line



class PurchaseOrderController extends Controller
{
    public function index()
    {
        $purchaseOrders = PurchaseOrder::paginate(10);
        return view('purchase.index', compact('purchaseOrders'));
    }


    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            // 'vehicle_id' => 'required|exists:vehicles,id',

            // Add your validation rules here
            // ...
        ]);

        // Create a new purchase order instance
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
        $purchaseOrder->owner_address = $request->input('owner_address');
        $purchaseOrder->deal_locked = $request->input('deal_locked');
        $purchaseOrder->balance_inspection = $request->input('balance_inspection');
        $purchaseOrder->owner_name = $request->input('owner_name');
        $purchaseOrder->car_touchups = $request->input('car_touchups');


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
        $purchaseOrder->advance_rs = $request->input('advance_rs');
        $purchaseOrder->balance_rs = $request->input('balance_rs');
        $purchaseOrder->balance_paid = $request->input('balance_paid');

        // Save the purchase order
        $purchaseOrder->save();

        // Store images in the public folder
        // Assuming $purchaseOrder is defined somewhere before calling storeImages
        $this->storeImages($purchaseOrder, $request->file('car_image'), 'public/car_images', 'car');
        $this->storeImages($purchaseOrder, $request->file('cplc_image'), 'public/cplc_images', 'cplc');
        $this->storeImages($purchaseOrder, $request->file('vehicle_image'), 'public/vehicle_images', 'vehicle');
        $this->storeImages($purchaseOrder, $request->file('seller_cnic_image'), 'public/seller_cnic_images', 'seller_cnic');
        $this->storeImages($purchaseOrder, $request->file('buyer_cnic_image'), 'public/buyer_cnic_images', 'buyer_cnic');


        // Redirect with success message
        return redirect()->route('purchase.index')->with('success', 'Purchase Order created successfully!');
    }

    private function storeImages($purchaseOrder, $images, $storagePath, $type)
    {
        if ($images) {
            foreach ($images as $image) {
                $filePath = $image->store($storagePath, 'public');

                // Save the file path and type to the database
                $purchaseOrder->images()->create([
                    'type' => $type,
                    'path' => $filePath,
                ]);
            }
        }
    }

    public function show()
    {

       $purchaseOrders = PurchaseOrder::all();

        $purchaseOrders->load('images');

        return view('purchase.show', compact('purchaseOrders'));
    }

    public function detail($id): View
    {
        $purchaseOrder = PurchaseOrder::findOrFail($id);
        $images = $purchaseOrder->images;

        return view('purchase.detail', compact('purchaseOrder', 'images'));
    }

    public function create()
    {

        return view('purchase.create');
    }

    public function edit($id)
    {
        $purchaseOrder = PurchaseOrder::with('images')->find($id);
        $images = $purchaseOrder->images;

        return view('purchase.edit', compact('purchaseOrder', 'images'));
    }

    public function update(Request $request, $id)
    {

        // Validate the request
        $request->validate([


        ]);
        // Find the purchase order to update
        $purchaseOrder = PurchaseOrder::findOrFail($id);

        // Update purchase order details
        $purchaseOrder->update([
            'membership_no' => $request->input('membership_no'),
            'make' => $request->input('make'),
            'model' => $request->input('model'),
            'regis_no' => $request->input('regis_no'),
            'serial_of_reg_book' => $request->input('serial_of_reg_book'),
            'engine_no' => $request->input('engine_no'),
            'chassis_no' => $request->input('chassis_no'),
            'colour' => $request->input('colour'),
            'serial_of_reg_challan' => $request->input('serial_of_reg_challan'),
            'owner_address' => $request->input('owner_address'),
            'deal_locked' => $request->input('deal_locked'),
            'balance_inspection' => $request->input('balance_inspection'),
            'owner_name' => $request->input('owner_name'),
            'car_touchups' => $request->input('car_touchups'),
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
            'advance_rs' => $request->input('advance_rs'),
            'balance_rs' => $request->input('balance_rs'),
            'balance_paid' => $request->input('balance_paid'),
        ]);

        // Update existing images and store new ones
        $this->updateImages($purchaseOrder, $request->file('car_image'), 'public/car_images', 'car');
        $this->updateImages($purchaseOrder, $request->file('cplc_image'), 'public/cplc_images', 'cplc');
        $this->updateImages($purchaseOrder, $request->file('vehicle_image'), 'public/vehicle_images', 'vehicle');
        $this->updateImages($purchaseOrder, $request->file('seller_cnic_image'), 'public/seller_cnic_images', 'seller_cnic');
        $this->updateImages($purchaseOrder, $request->file('buyer_cnic_image'), 'public/buyer_cnic_images', 'buyer_cnic');

        // Redirect with success message
        return redirect()->route('purchase.index')->with('success', 'Purchase Order updated successfully!');
    }

    private function updateImages($purchaseOrder, $images, $storagePath, $type)
    {
        // Delete existing images for the type
        $purchaseOrder->images()->where('type', $type)->delete();

        // Store new images
        if ($images) {
            foreach ($images as $image) {
                $filePath = $image->store($storagePath, 'public');

                // Save the file path and type to the database
                $purchaseOrder->images()->create([
                    'type' => $type,
                    'path' => $filePath,
                ]);
            }
        }
    }

    public function destroy(Request $request, $id)
    {
        $purchaseOrder = PurchaseOrder::findOrFail($id);
        $purchaseOrder->delete();
        return redirect()->route('purchase.index')->with('success', 'Deleted');
    }
}

// Set other fields
