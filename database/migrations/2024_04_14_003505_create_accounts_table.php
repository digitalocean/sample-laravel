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
            $table->ulid('id');
            $table->unsignedBigInteger('user_id');
            $table->foreignIdFor(User::class);
            $table->String('Name');
            $table->String('CompanyName')->nullable();
            $table->String('CompanyAddress')->nullable();
            $table->String('WalletAmount')->nullable();
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
