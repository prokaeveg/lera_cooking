<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        )->withPivot('amount')->orderBy('sort', 'asc');
    }

    public function notes(): HasMany
    {
        return $this->hasMany(
            Note::class,
            'receipt_code',
            'code'
        );
    }

    public function ingredientsForList(): string
    {
        $ingredients = $this->ingredients();

        return implode(
            ', ',
            $ingredients->get()->map(fn (Ingredient $ingredient) => mb_strtolower($ingredient->name))->all()
        );
    }
}
