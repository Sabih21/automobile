<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'cnic_no' => 'required|string|unique:customers',
            'address' => 'nullable|string',
            'phone_no' => 'nullable|string',
        ]);

        Customer::create($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer created successfully!');
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);

        return response()->json($customer);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'cnic_no' => 'required|string|unique:customers,cnic_no,' . $id,
            'address' => 'nullable|string',
            'phone_no' => 'nullable|string',
        ]);

        $customer = Customer::findOrFail($id);
        $customer->update($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully!');
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully!');
    }
}
