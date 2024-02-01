<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpenceType;

class ExpenseTypeController extends Controller
{
    public function index()
    {
        $expenseTypes = ExpenceType::all();
        return view('expence_type.index', compact('expenseTypes'));
    }

    public function create()
    {
        return view('expence_type.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
        ]);

        ExpenceType::create($request->all());

        return redirect()->route('expence_types.index')->with('success', 'Expense Type created successfully');
    }

    public function edit($id)
    {
        $expenseType = ExpenceType::findOrFail($id);
        return view('expence_type.edit', compact('expenseType'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
        ]);
    
        $expenseType = ExpenceType::findOrFail($id);
        $expenseType->update($request->all());
    
        return response()->json(['success' => true, 'message' => 'Expense Type updated successfully']);
    }
    
    public function destroy($id)
    {
        $expenseType = ExpenceType::findOrFail($id);
        $expenseType->delete();

        return redirect()->route('expence_types.index')->with('success', 'Expense Type deleted successfully');
    }
}
