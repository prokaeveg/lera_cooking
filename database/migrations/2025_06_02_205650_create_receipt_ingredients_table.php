<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('receipt_ingredients', static function (Blueprint $table) {
            $table->string('receipt_code');
            $table->string('ingredient_code');
            $table->string('amount');

            $table->foreign('receipt_code')->references('code')->on('receipts');
            $table->foreign('ingredient_code')->references('code')->on('ingredients');

            $table->primary(['receipt_code', 'ingredient_code']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receipt_ingredients');
    }
};
