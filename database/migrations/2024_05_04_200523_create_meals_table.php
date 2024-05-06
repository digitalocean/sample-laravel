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
        Schema::create('meals', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->String('Cusine', 100);
            $table->String('Calories', 5);
            $table->String('Description', 250);
            $table->String('Price', 10);
            $table->timestamps();
        });

        Schema::create('kiosk_meals', function (Blueprint $table) {
            $table->foreignUlid('kiosks_id');
            $table->foreignUlid('meals_id');
            $table->String('Total', 3);
            $table->String('StockTotal', 3);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meals');
    }
};
