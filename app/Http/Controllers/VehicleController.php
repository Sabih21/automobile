<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use Illuminate\View\View;
use App\Models\VehicleImage;
use Illuminate\Support\Facades\Storage;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicle = Vehicle::all();
        return view('vehicles.index', compact('vehicle'));

    }

    public function create()
    {
        return view('vehicles.create');
    }   

    
    public function store(Request $request)
    {
        
            // $request->validate([
            //     // ... your existing validation rules
            //     'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // ]);
        

        $vehicle = new Vehicle([
            'Make' => $request->input('Make'),
            'Model' => $request->input('Model'),
            'Year' => $request->input('Year'),
            'Color' => $request->input('Color'),
            'VIN' => $request->input('VIN'),
            'Amount' => $request->input('Amount'),
            'LicensePlate' => $request->input('LicensePlate'),
            'PurchaseDate' => $request->input('PurchaseDate'),
            'PurchasePrice' => $request->input('PurchasePrice'),
            'CurrentValue' => $request->input('CurrentValue'),
            'Condition' => $request->input('Condition'),
            'FuelType' => $request->input('FuelType'),
            'Mileage' => $request->input('Mileage'),
            'EngineNumber' => $request->input('EngineNumber'),
            'Transmission' => $request->input('Transmission'),
            'ManufacturerID' => $request->input('ManufacturerID'),
        ]); 

        $vehicle->save();


        // Handle vehicle images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('vehicle_images', 'custom'); // Use the appropriate disk name from filesystem.php

                // Save image in vehicle_images table
                VehicleImage::create([
                    'vehicle_id' => $vehicle->VehicleID,
                    'image_path' => $path,
                ]);
                // $vehicleImage->save();

            }
        }
        

      
        return redirect()->route('vehicles.index');
     }

     public function edit($id)
     {
         $vehicle = vehicle::findOrFail($id);
         $images = $vehicle->images; 
         return view('vehicles.edit', compact('vehicle' ,'images'));
     }
 
     public function update(Request $request, $id)
     {
         $vehicle = Vehicle::findOrFail($id);
     
       
         $vehicle->update($request->all());
     
       
         if ($request->hasFile('images')) {
             
             $vehicle->images()->delete();
     
            
             foreach ($request->file('images') as $image) {
                 $path = $image->store('vehicle_images', 'custom');
     
                 VehicleImage::create([
                     'vehicle_id' => $vehicle->VehicleID,
                     'image_path' => $path,
                 ]);
             }
         }
     
         return redirect()->route('vehicles.index')->with('success', 'Vehicle updated successfully');
     }
     
 
     public function destroy($id)
     {
         $vehicle = Vehicle::findOrFail($id);
         $vehicle->images()->delete();

         $vehicle->delete();
     
         return redirect()->route('vehicles.index')
             ->with('success', 'Vehicle deleted successfully');
     }

     
        public function show()
        {
            // Fetch all vehicles
            $vehicles = Vehicle::all();
        
            // Eager load images to avoid N+1 problem
            $vehicles->load('images');
        
            return view('vehicles.show', compact('vehicles'));
        }
       
        public function detail($id): View
        {
            $vehicle = Vehicle::findOrFail($id);
            $images = $vehicle->images; 

            return view('vehicles.detail', compact('vehicle' ,'images'));
        }
};
