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
            $table->string('email', 50);
            $table->string('submitted_on', 50);
            $table->string('phone', 14);
            $table->string('parent_name', 250);
            $table->string('parent_job', 50);
            $table->string('parent_phone', 14);
            $table->string('parent_email', 50);
            $table->longText('application_essay');
            $table->longText('community_service');
            $table->string('school', 50);
            $table->string('graduation_year', 25);
            $table->string('gpa', 10);
            $table->string('sat_scheduled', 100);
            $table->string('sat_score', 25);
            $table->string('act_scheduled', 100);
            $table->string('act_score', 50);
            $table->string('ap_test_name', 100);
            $table->string('ap_test_score', 100);
            $table->string('ap_test_name2', 100);
            $table->string('ap_test_score2', 100);
            $table->string('college_major', 50);
            $table->string('college_interest', 50);
            $table->string('college_major2', 50);
            $table->string('college_interest2', 50);
            $table->string('college_choice', 50);
            $table->string('college_status', 50);
            $table->string('college_choice2', 50);
            $table->string('college_status2', 50);
            $table->string('family_income', 50);
            $table->string('siblings', 10);
            $table->string('siblings_attending_college', 10);
            $table->boolean('fasfa_acknowledgement');
            $table->string('scholarship_choice', 200);
            $table->string('scholarship_choice2', 200);
            $table->string('scholarship_choice3', 200);
            $table->string('scholarship_choice4', 200);
            $table->string('scholarship_choice5', 200);
            $table->string('scholarship_choice6', 200);
            $table->string('scholarship_choice7', 200);
            $table->string('reference', 50);
            $table->string('reference_email', 50);
            $table->string('reference_relationshsip', 50);
            $table->string('reference2', 50);
            $table->string('reference_email2', 50);
            $table->string('reference_relationshship2', 50);
            $table->string('resume_upload', 250);
            $table->string('essay_upload', 250);
            $table->string('additional_information_upload', 250);  
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
