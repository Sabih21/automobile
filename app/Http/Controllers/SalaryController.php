<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salary;
use App\Models\User;

class SalaryController extends Controller
{
   

    public function index()
    {
        $salaries = Salary::all();
        $users = User::all();
        return view('salary.index', compact('salaries', 'users'));
    }

    public function create()
    {
        $users = User::all();
        return view('salary.create', compact('users'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'user_id' => 'required',
            'salary' => 'required|numeric',
            'date' => 'required|date',
        ]);

        // Create a new salary record
        Salary::create([
            'user_id' => $request->input('user_id'),
            'salary' => $request->input('salary'),
            'date' => $request->input('date'),
        ]);

        return redirect()->route('salaries.index')->with('success', 'Salary added successfully.');
    }

    public function edit($id)
    {
        $salary = Salary::findOrFail($id);
        $users = User::all();

        return view('salary.edit', compact('salary', 'users'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'user_id' => 'required',
            'salary' => 'required|numeric',
            'date' => 'required|date',
        ]);

        // Find the salary record and update it
        $salary = Salary::findOrFail($id);
        $salary->update([
            'user_id' => $request->input('user_id'),
            'salary' => $request->input('salary'),
            'date' => $request->input('date'),
        ]);

        return redirect()->route('salaries.index')->with('success', 'Salary updated successfully.');
    }

    public function destroy($id)
    {
        // Find the salary record and delete it
        $salary = Salary::findOrFail($id);
        $salary->delete();

        return redirect()->route('salaries.index')->with('success', 'Salary deleted successfully.');
    }
}
