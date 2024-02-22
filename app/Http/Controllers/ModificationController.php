<?php

// app/Http/Controllers/ModificationController.php

namespace App\Http\Controllers;

use App\Models\Modification;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use DB;

class ModificationController extends Controller
{

// forinalprice
//     public function calculateFinalPrice()
//     {
//         // Eloquent query to join the Modification and Vehicle tables and calculate the final price
//         $result = DB::table('modifications')
//             ->join('vehicles', 'modifications.vehicle_id', '=', 'vehicles.id')
//             ->select('vehicles.id', DB::raw('SUM(vehicles.Amount + modifications.price) as final_price'))
//             ->groupBy('vehicles.id')
//             ->get();
    
//         // Store the final prices in an associative array
//         $finalPrices = [];
//         foreach ($result as $row) {
//             $finalPrices[$row->id] = $row->final_price;
//         }
    
//         return view('modifications.final_prices', compact('finalPrices'));
//     }
    
    public function index()
    {
        $modifications = Modification::with('vehicle')->get();

        // Calculate total amount for each modification
        foreach ($modifications as $modification) {
            $modification->totalAmount = $this->calculateTotalPriceByVehicle($modification->vehicle_id);
        }

        return view('modifications.index', compact('modifications'));
    }


    public function calculateTotalPriceByVehicle($vehicleId)
    {
        // Eloquent query to get the sum of 'price' for rows with the same 'vehicle_id'
        $totalPrice = Modification::where('vehicle_id', $vehicleId)->sum('price');
        return $totalPrice;
    }

    public function create()
    {
        $vehicles = Vehicle::all();
        return view('modifications.create', compact('vehicles'));
    }

   

    public function store(Request $request)
    {
        $data = $request->all();

      
        foreach ($data['part_name'] as $key => $partName) {
            Modification::create([
                'vehicle_id' => $data['vehicle_id'],
                'part_name' => $partName,
                'price' => $data['price'][$key],
                'description' => $data['description'],
                'date_time' => $data['date_time'],
            ]);
        }

        return redirect()->route('modifications.index')->with('success','Modifications added successfully!');
    }

    public function edit($id)
    {
        $modification = Modification::findOrFail($id);
        $vehicles = Vehicle::all();
        return view('modifications.edit', compact('modification', 'vehicles'));
    }

    public function update(Request $request, $id)
    {
        $modification = Modification::findOrFail($id);
        $data = $request->all();

           $modification->update([
            'vehicle_id' => $data['vehicle_id'],
            'part_name' => $data['part_name'],
            'price' => $data['price'],
            'description' => $data['description'],
            'date_time' => $data['date_time'],
        ]);

        return redirect()->route('modifications.index')->with('success', 'Modification updated successfully!');
    
    }

    public function destroy($id)
    
    {
    
        $modification = Modification::findOrFail($id);
        $modification->delete();

        return redirect()->route('modifications.index')->with('success', 'Modification deleted successfully!');
    
    }

   }
