<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Block;
use App\Models\Harvest;


class HarvestController extends Controller
{
    /**
     * Melibatkan 'block' agar query tidak terlalu berat.
     */
    public function index()
    {
        $harvests = Harvest::with('block')->latest()->get();
        return view('harvests.index', compact('harvests'));
    }

    /**
     * Methode untuk menuju form penginputan data Harvest dan melibatkan Block untuk dijadikan dropdown.
     */
    public function create()
    {
        $blocks = Block::all();
        return view('harvests.create', compact('blocks'));
    }

    /**
     * Methode Validasi Data dan menyimpan.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'block_id' => 'required|exists:blocks,id',
            'harvest_date' => 'required|date',
            'weight_count' => 'required|numeric|min:0',
            'worker_count' => 'required|integer|min:1',
            'notes' => 'nullable|string',
        ]);

        \App\Models\Harvest::create($validated);

        return redirect()->route('harvests.index')->with('success', 'Data panen berhasil dicatat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Methode untuk edit data Panen\Harvest.
     */
    public function edit(string $id)
    {
        $harvests = Harvest::findOrFail($id);
        $blocks = Block::all();
        return view('harvests.edit', compact('harvests', 'blocks'));
    }

    /**
     * Methode untuk Post data Harvest setelah dilakukan input ulang pada halaman edit.
     */
    public function update(Request $request, string $id)
    {
        $harvests = Harvest::findOrFail($id);

        $validated = $request->validate([
            'block_id' => 'required|exists:blocks,id',
            'harvest_date' => 'required|date',
            'weight_count' => 'required|numeric|min:0',
            'worker_count' => 'required|integer|min:1',
            'notes' => 'nullable|string',
        ]);

        $harvests->update($validated);

        return redirect()->route('harvests.index')->with('Success', 'Data panen berhasil diupdate!!!');
    }

    /**
     * Methode untuk menghapus data panen.
     */
    public function destroy(string $id)
    {
        $harvests = Harvest::findOrFail($id);
        $harvests->delete();

        return redirect()->route('harvests.index')->with('Success', 'Data berhasil dihapus!!!');
    }
}
