<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\BlockController;
use App\Http\Controllers\HarvestController;
use App\Http\Controllers\ExpenseController;
use Illuminate\Support\Facades\Route;
/* INi Route Landing Page */

Route::get('/', [LandingController::class, 'index']);
/* Ini ROute Middleware untuk login dan menuju dashboard */
Route::get('/dashboard', function () {
    return view('dashboard');
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

require __DIR__ . '/auth.php';
