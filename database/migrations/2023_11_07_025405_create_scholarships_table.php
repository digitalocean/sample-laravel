<?php

use App\Models\Partner;
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
        Schema::create('scholarships', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignIdFor(Partner::class);
            $table->date('deadline');
            $table->longText('description');
            $table->integer('award_payments');
            $table->longText('additional_information');
            $table->string('review_applicants');
            $table->string('selection_criteria');
            $table->string('award_based_on');
            $table->string('renewability', 60);
            $table->string('requirement_criteria');
            $table->string('uses');
            $table->integer('fund_amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scholarships');
    }
};
