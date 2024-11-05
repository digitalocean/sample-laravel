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
        Schema::create('scholarshipQuestion_scholarships', function (Blueprint $table) {
            $table->id();
            $table->foreignId('scholarship_id');
            $table->string('question');
            $table->timestamps();
        });

        Schema::create('scholarshipQuestion_application', function (Blueprint $table) {
            $table->id();
            $table->foreignId('scholarship_id');
            $table->foreignId('application_id');
            $table->string('question');
            $table->string('answer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scholarshipquestion');
    }
};
