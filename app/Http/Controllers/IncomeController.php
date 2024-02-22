<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;
use App\Http\Requests\Income\IncomeRequest;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incomes = Income::paginate(10);
        return view('income.index', compact('incomes'));
    }

        /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IncomeRequest $request)
    {
        try {
            Income::create([
                'source' => $request->source,
                'amount' => $request->amount,
                'date' => $request->date,
                'description' => $request->description,
            ]);

            return response()->json([
                'message' => 'Income created successfully'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Error creating income'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IncomeRequest $request, string $id)
    {
        try {
            $income = Income::findOrFail($id);
            $income->update([
                'source' => $request->source,
                'amount' => $request->amount,
                'date' => $request->date,
                'description' => $request->description,
            ]);

            return response()->json([
                'message' => 'Income updated successfully'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Error updating income'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $income = Income::findOrFail($id);
            $income->delete();

            return response()->json([
                'message' => 'Income deleted successfully'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Error deleting income'
            ]);
        }
    }
}
