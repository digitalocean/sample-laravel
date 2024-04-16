<?php

use App\Models\Account;
use App\Models\Kisok;
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
            $table->ulid('id')->primary();
            $table->foreignId('user_id')->constrained(
                table: 'accounts', indexName: 'account_id'
            );
            $table->String('MachineID');
            $table->String('TradeNO');
            $table->String('KioskName');
            $table->String('KioskAddress');
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignId('user_id')->constrained(
                table: 'kiosks', indexName: 'kiosk_id'
            );
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
