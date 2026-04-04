<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlockController extends Controller
{
    /**
     * Ini Method untuk Menampilkan Data.
     */
    public function index()
    {
        $blocks = \App\Models\Block::latest()->get();
        return view('blocks.index', compact('blocks'));
    }

    /**
     * Ini Methode untk menuju halaman form data.
     */
    public function create()
    {
        return view('blocks.create');
    }

    /**
     * Ini Method untuk Membuat Data,Memvalidasi,dan Menyimpan.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'area' => 'required|numeric|min:0.1',
            'year_planted' => 'required|integer|min:1900|max:' . date('Y'),
            'tree_count' => 'nullable|integer|min:0',
            'description' => 'nullable|string',
        ]);

        \App\Models\Block::create($validated);
        return redirect()->route('blocks.index')->with('success', 'Data Blok Telah ditambahkan');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
