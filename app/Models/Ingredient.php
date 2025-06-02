<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $table = 'ingredients';

    protected $fillable = ['code', 'name'];

    public function receipts()
    {
        return $this->belongsToMany(
            Receipt::class,
            'receipts_ingredients',
            'ingredient_code',
            'receipt_code',
            'code',
            'code',
        )->withPivot('amount');
    }
}
