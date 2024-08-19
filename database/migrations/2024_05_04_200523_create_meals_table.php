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
            $table->bigIncrements('id');
            $table->String('Cuisine', 100);
            $table->String('Calories', 5);
            $table->String('Category', 25);
            $table->String('Description', 500);
            $table->String('Price', 6);
            $table->String('NutritionalValue', 5);
            $table->String('MealType', 10);
            $table->String('productID', 10);
            $table->timestamps();
        });

        Schema::create('kiosk_meal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignUlid('kiosk_id');
            $table->foreignId('meal_id');
            $table->String('Total', 3)->default(10);
            $table->String('StockTotal', 3)->default(5);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meals');
        Schema::dropIfExists('kiosk_meal');
    }
};
