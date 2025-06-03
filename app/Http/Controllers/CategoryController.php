<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function show(string $code)
    {
        $category = Category::where('code', $code)->firstOrFail();
        $receipts = $category->receipts()->get();

        return view('category', ['category' => $category, 'receipts' => $receipts]);
    }
}
