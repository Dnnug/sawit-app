<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Block;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenses = Expense::with('block')->latest()->get();
        $total_expense = $expenses->sum('amount');
        return view('expenses.index', compact('expenses', 'total_expense'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $blocks = Block::all();
        return view('expenses.create', compact('blocks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'block_id'    => 'nullable|exists:blocks,id',
            'date'        => 'required|date',
            'title'       => 'required|string|max:255',
            'category'    => 'required|string',
            'amount'      => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        \App\Models\Expense::create($validated);

        return redirect()->route('expenses.index')->with('success', 'Pengeluaran berhasil dicatat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $expenses = Expense::findOrFail($id);
        $blocks = Block::all();
        return view('expenses.edit', compact('expenses', 'blocks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $expenses = Expense::findOrFail($id);

        $validated = $request->validate([
            'block_id'    => 'nullable|exists:blocks,id',
            'date'        => 'required|date',
            'title'       => 'required|string|max:255',
            'category'    => 'required|string',
            'amount'      => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        $expenses->update($validated);
        return redirect()->route('expenses.index')->with('success', 'Data Pengeluaran berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $expenses = Expense::findOrFail($id);
        $expenses->delete();
        return redirect()->route('expenses.index')->with('success', 'Data Pengeluaran berhasil di Hapus!!!');
    }
}
