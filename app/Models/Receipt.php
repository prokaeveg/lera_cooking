<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Receipt extends Model
{
    protected $table = 'receipts';
    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany(
            Ingredient::class,
            'receipt_ingredients',
            'receipt_code',
            'ingredient_code',
            'code',
            'code',
        )->withPivot('amount');
    }
}
