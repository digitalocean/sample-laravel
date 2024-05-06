<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignId('user_id');
            $table->String('Name');
            $table->String('CompanyName')->nullable();
            $table->String('CompanyAddress')->nullable();
            $table->String('WalletAmount')->nullable();
            $table->String('Status')->nullable();
            $table->String('Type')->nullable();
            $table->timestamps();
        });

        Schema::create('kiosks', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('account_id');
            $table->String('MachineID');
            $table->String('TradeNO');
            $table->String('KioskName');
            $table->String('KioskAddress');
            $table->String('DecimalLocation');
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('kiosk_id');
            $table->String('OrderNumber');
            $table->String('MealName');
            $table->String('Category');
            $table->String('SessionCode');
            $table->String('SlotNO');
            $table->String('Amount');
            $table->String('Discount');
            $table->String('ProductID');
            $table->integer('Status');
            $table->timestamp('Time');
            $table->String('QrCode');
            $table->String('Code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
