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

        Schema::create('requirements', function (Blueprint $table) {
            $table->bigIncrements('id'); // permission id
            $table->string('name');
        });
        Schema::create('requirement_scholarships', function (Blueprint $table) {
            $table->foreignId('requirement_id');
            $table->foreignId('scholarship_id');
        });

        Schema::create('selectioncriterias', function (Blueprint $table) {
            $table->bigIncrements('id'); // permission id
            $table->string('name');
        });

        Schema::create('selectioncriteria_scholarships', function (Blueprint $table) {
            $table->foreignId('selectioncriteria_id');
            $table->foreignId('scholarship_id');
        });

        Schema::create('scholarshipuses', function (Blueprint $table) {
            $table->bigIncrements('id'); // permission id
            $table->string('name');
        });

        Schema::create('scholarshipuse_scholarships', function (Blueprint $table) {
            $table->foreignId('scholarshipuse_id');
            $table->foreignId('scholarship_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
