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
        Schema::create('restocks', function (Blueprint $table) {
            $table->id();
            $table->foreignUlid('kiosk_id');
            $table->String('machineID', 150);
            $table->String('restockId', 150);
            $table->String('kioskName', 150);
            $table->String('mealName', 150);
            $table->String('category', 150)->nullable();
            $table->String('qty', 10);
            $table->String('deliverName', 50);
            $table->String('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restocks');
    }
};
