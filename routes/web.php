<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/category/{code}', [CategoryController::class, 'show'])->name('category');

Route::get('/recipe/{id}', function ($id) {
    $recipe = \App\Models\Recipe::with('ingredients')->findOrFail($id);
    return view('recipe', compact('recipe'));
});
