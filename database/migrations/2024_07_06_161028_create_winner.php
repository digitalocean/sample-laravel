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
        Schema::create('winners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('scholarship_id');
            $table->foreignId('scholar_id');
            $table->string('studentName', 100);
            $table->string('contactNumber', 20);
            $table->string('studentEmail', 100);
            $table->string('award_payments', 10);
            $table->string('frequnecy', 100);
            $table->date('distributionDate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('winner');
    }
};
