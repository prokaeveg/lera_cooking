<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $table = 'categories';

    public function receipts(): HasMany
    {
        return $this->hasMany(Receipt::class, 'category_code', 'code');
    }
}
