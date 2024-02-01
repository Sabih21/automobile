<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salary;
use App\Models\User;

class SalaryController extends Controller
{
    public function index()
    {
        $salaries = Salary::with('user')->get();
        // dd($salaries); // Debugging line


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
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'salary' => 'required|numeric',
            'date' => 'required|date',
        ]);

        $salary = new Salary;
        $salary->user_id = $request->input('user_id');
        $salary->salary = $request->input('salary');
        $salary->date = $request->input('date');
        $salary->save();
        return redirect()->route('salaries.index')->with('success', 'Salary created successfully');
    }

    // Add other methods like edit, update, destroy as needed
}