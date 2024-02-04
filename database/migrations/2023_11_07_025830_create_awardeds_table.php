<?php

use App\Models\Application;
use App\Models\Scholarship;
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
        Schema::create('awardeds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignIdFor(Application::class);
            $table->foreignIdFor(Scholarship::class);
            $table->decimal('award_amount', 8 , 2);
            $table->longText('comments');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('awardeds');
    }
};
