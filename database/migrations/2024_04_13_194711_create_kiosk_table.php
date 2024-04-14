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
        Schema::create('kiosks', function (Blueprint $table) {
            $table->ulid('id');
            $table->unsignedBigInteger('Account_id');
            $table->foreign('Account_id')->references('id')->on('accounts');
            $table->String('MachineID');
            $table->String('TradeNO');
            $table->String('KioskName');
            $table->String('KioskAddress');
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->ulid('id');
            $table->unsignedBigInteger('Kiosk_id');
            $table->foreign('Kiosk_id')->references('id')->on('Kiosks');
            $table->String('OrderNumber');
            $table->String('MealName');
            $table->String('Category');
            $table->String('SessionCode');
            $table->String('SlotNO');
            $table->String('Amount');
            $table->String('discount');
            $table->String('ProductID');
            $table->integer('Status');
            $table->timestamp('Time');
            $table->String('qrCode');
            $table->String('Code');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kiosk');
    }
};
