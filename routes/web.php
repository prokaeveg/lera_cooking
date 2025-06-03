<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Models\Receipt;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/category/{code}', [CategoryController::class, 'show'])->name('category');

Route::get('/receipt/{code}', static function ($code) {
    $receipt = Receipt::with('ingredients')->firstWhere('code', $code);

    return view('receipt', compact('receipt'));
})->name('receipt');
