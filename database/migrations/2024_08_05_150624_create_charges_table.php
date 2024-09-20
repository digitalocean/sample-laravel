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
        Schema::create('charges', function (Blueprint $table) {
            $table->id();
            $table->String('chargeID');
            $table->String('object');
            $table->integer('amount');
            $table->integer('ammount_captured');
            $table->integer('amount_refunded')->nullable();
            $table->String('balance_transaction');
            $table->String('email')->nullable();
            $table->String('phone')->nullable();
            $table->String('seller_message');
            $table->String('type');
            $table->String('payment_method');
            $table->String('cardBrand');
            $table->String('exp_month');
            $table->String('exp_year');
            $table->String('last4');
            $table->String('wallet')->nullable();
            $table->String('receipt_email')->nullable();
            $table->String('receipt_number')->nullable();
            $table->String('receipt_url');
            $table->String('refunded');
            $table->String('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('charges');
    }
};
