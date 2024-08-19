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
            $table->String('Name', 100);
            $table->String('Phone', 20)->nullable();
            $table->String('CompanyName', 100)->nullable();
            $table->String('CompanyAddress')->nullable();
            $table->String('City')->nullable();
            $table->String('State')->nullable();
            $table->String('Zip')->nullable();
            $table->String('WalletAmount', 10)->nullable();
            $table->String('Status')->nullable();
            $table->String('Type')->nullable();
            $table->timestamps();
        });

        Schema::create('kiosks', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('Account_id');
            $table->String('MachineID');
            $table->String('TradeNO');
            $table->String('KioskType');
            $table->String('KioskNumber');
            $table->String('KioskAddress');
            $table->String('City', 150)->nullable();
            $table->String('State', 20)->nullable();
            $table->String('Zip', 10)->nullable();
            $table->String('Longitude')->nullable();
            $table->String('Latitude')->nullable();
            $table->String('Status', 10)->default('offline');
            $table->String('TotalMeals', 5)->nullable();
            $table->String('TotalSold', 5)->nullable();
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('kiosk_id');
            $table->String('kioskName', 25)->nullable();
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
            $table->String('Member', 15)->nullable();
            $table->String('Account_id')->nullable();
            $table->String('Quantity');
            $table->String('QrCode');
            $table->String('Code');
            $table->String('PaymentStatus', 15)->nullable();
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
