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
        Schema::create('menu_saves', function (Blueprint $table) {
            $table->uuid('id',36)->primary();
            $table->foreignUuId('user_id')->constrained();
            $table->date('date');
            $table->uuid('breakfast_category1_id')->nullable()->constrained('recipes')->nullOnDelete();
            $table->uuid('breakfast_category2_id')->nullable()->constrained('recipes')->nullOnDelete();
            $table->uuid('breakfast_category3_1_id')->nullable()->constrained('recipes')->nullOnDelete();
            $table->uuid('breakfast_category3_2_id')->nullable()->constrained('recipes')->nullOnDelete();
            $table->uuid('lunch_category1_id')->nullable()->constrained('recipes')->nullOnDelete();
            $table->uuid('lunch_category2_id')->nullable()->constrained('recipes')->nullOnDelete();
            $table->uuid('lunch_category3_1_id')->nullable()->constrained('recipes')->nullOnDelete();
            $table->uuid('lunch_category3_2_id')->nullable()->constrained('recipes')->nullOnDelete();
            $table->uuid('dinner_category1_id')->nullable()->constrained('recipes')->nullOnDelete();
            $table->uuid('dinner_category2_id')->nullable()->constrained('recipes')->nullOnDelete();
            $table->uuid('dinner_category3_1_id')->nullable()->constrained('recipes')->nullOnDelete();
            $table->uuid('dinner_category3_2_id')->nullable()->constrained('recipes')->nullOnDelete();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_saves');
    }
};
