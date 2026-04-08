<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\BlockController;
use App\Http\Controllers\HarvestController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\PriceController;

use App\Models\Block;
use App\Models\Harvest;
use App\Models\Expense;
use App\Models\Price;

use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
/* INi Route Landing Page */

Route::get('/', [LandingController::class, 'index']);
/* Ini ROute Middleware untuk login dan menuju dashboard */
Route::get('/dashboard', function () {
    // Data-data
    $total_blocks = Block::count();
    $total_weight = Harvest::sum('weight_count');
    $total_expense = Expense::sum('amount');

    // Hitung Revenue Otomatis
    // dan ambil semua data panen
    $harvests = Harvest::all();
    $total_revenue = 0;

    foreach ($harvests as $harvest) {
        // Cari harga yang pas dengan tanggal panen
        $priceEntry = Price::where('date', $harvest->harvest_date)->first();

        // Jika tidak ada harga di tanggalnya, pakai harga terakhir yang pernah diinput
        if (!$priceEntry) {
            $priceEntry = Price::orderBy('date', 'desc')->first();
        }

        $currentPrice = $priceEntry ? $priceEntry->price_per_kg : 0;
        $total_revenue += ($harvest->weight_count * $currentPrice);
    }

    // Hitung Profit
    $net_profit = $total_revenue - $total_expense;

    return view('dashboard', [
        'total_blocks' => $total_blocks,
        'total_weight' => $total_weight,
        'total_revenue' => $total_revenue,
        'total_expense' => $total_expense,
        'net_profit' => $net_profit,
        'recent_harvests' => Harvest::with('block')->latest()->take(5)->get(),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

/** Ini Route Middleware + CRUD untuk Profile/ Default Breeze */
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/** INI Route untuk CRUD Blocks */
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('blocks', BlockController::class);
});

/** Route CRUD Harvests */
Route::resource('harvests', HarvestController::class)->middleware('auth');

/** Route CRUD Expense */
Route::resource('expenses', ExpenseController::class)->middleware('auth');

/** Route CRUD Prices */
Route::resource('prices', PriceController::class)->middleware('auth');

require __DIR__ . '/auth.php';
