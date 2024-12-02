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
        Schema::create('applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 50);
            $table->string('email', 50)->nullable();
            $table->boolean('verified')->nullable();
            $table->string('submitted_on', 50)->nullable();
            $table->string('phone', 14)->nullable();
            $table->string('parent_name', 250)->nullable();
            $table->string('parent_job', 50)->nullable();
            $table->string('parent_phone', 14)->nullable();
            $table->string('parent_email', 50)->nullable();
            $table->longText('application_essay')->nullable();
            $table->longText('community_service')->nullable();
            $table->string('school', 50)->nullable();
            $table->string('graduation_year', 25)->nullable();
            $table->string('gpa', 10)->nullable();
            $table->string('sat_scheduled', 100)->nullable();
            $table->string('sat_score', 25)->nullable();
            $table->string('act_scheduled', 100)->nullable();
            $table->string('act_score', 50)->nullable();
            $table->string('ap_test_name', 100)->nullable();
            $table->string('ap_test_score', 100)->nullable();
            $table->string('ap_test_name2', 100)->nullable();
            $table->string('ap_test_score2', 100)->nullable();
            $table->string('college_major', 50)->nullable();
            $table->string('college_interest', 50)->nullable();
            $table->string('college_major2', 50)->nullable();
            $table->string('college_interest2', 50)->nullable();
            $table->string('college_choice', 50)->nullable();
            $table->string('college_status', 50)->nullable();
            $table->string('college_choice2', 50)->nullable();
            $table->string('college_status2', 50)->nullable();
            $table->string('family_income', 50)->nullable();
            $table->string('siblings', 10)->nullable();
            $table->string('siblings_attending_college', 10)->nullable();
            $table->boolean('fasfa_acknowledgement')->nullable();
            $table->string('reference', 50)->nullable();
            $table->string('reference_email', 50)->nullable();
            $table->string('reference_relationsship', 50)->nullable();
            $table->string('reference2', 50)->nullable();
            $table->string('reference_email2', 50)->nullable();
            $table->string('reference_relationship2', 50)->nullable();
            $table->string('resume_upload', 250)->nullable();
            $table->string('essay_upload', 250)->nullable();
            $table->string('additional_information_upload', 250)->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
