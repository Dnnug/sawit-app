<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prices = \App\Models\Price::orderBy('date', 'desc')->paginate(10);

        // Mengambil harga terbaru untuk dijadikan nilai default di form
        $latest_price = \App\Models\Price::orderBy('date', 'desc')->first();

        return view('prices.index', compact('prices', 'latest_price'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'price_per_kg' => 'required|numeric|min:0',
        ]);

        Price::updateOrCreate(
            ['date' => $validated['date']],
            ['price_per_kg' => $validated['price_per_kg']]
        );

        return redirect()->back()->with('success', 'Harga harian telah berhasil diperbarui');
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
    public function destroy($id)
    {
        $prices = \App\Models\Price::findOrFail($id);
        $prices->delete();

        return redirect()->back()->with('success', 'Riwayat harga berhasil dihapus');
    }
}
