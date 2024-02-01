<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expence;
use App\Models\ExpenceType;

class ExpenseController extends Controller
{
    public function index()
    {
        // Assuming you retrieve expenses and expenseTypes from your database
        $expenses = Expence::with('expenceType')->get();
        $expenseTypes = ExpenceType::all();
    
        // Pass $expenses and $expenseTypes to the view
        return view('expence.index', compact('expenses', 'expenseTypes'));
    }

    public function create()
    {
        $expenseTypes = ExpenceType::all();
        return view('expence.create', compact('expenseTypes'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'expence_type_id' => 'required|exists:expence_types,id',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        Expence::create($request->all());

        return redirect()->route('expences.index')->with('success', 'Expense created successfully');
    }
    public function edit($id)
    {
        $expense = Expence::findOrFail($id);
        $expenseTypes = ExpenceType::all();
    
        return view('expence.edit', compact('expense', 'expenseTypes'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'expence_type_id' => 'required|exists:expence_types,id',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        $expence = Expence::findOrFail($id);
        $expence->update($request->all());

        return redirect()->route('expences.index')->with('success', 'Expense updated successfully');
    }

    public function destroy($id)
    {
        $expence = Expence::findOrFail($id);
        $expence->delete();

        return redirect()->route('expences.index')->with('success', 'Expense deleted successfully');
    }
}
