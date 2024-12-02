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
            $table->string('question1')->nullable();
            $table->string('question2')->nullable();
            $table->string('question3')->nullable();
            $table->timestamps();
        });

        Schema::create('application_scholarshipQuestions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('scholarship_id');
            $table->foreignId('application_id');
            $table->string('question1')->nullable();
            $table->string('answer1')->nullable();
            $table->string('question2')->nullable();
            $table->string('answer2')->nullable();
            $table->string('question3')->nullable();
            $table->string('answer3')->nullable();
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
